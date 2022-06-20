import Form from "../Form";

export default class UsersFormComponent {
    constructor(id) {
        this.$el = document.getElementById(id);
        if (this.$el) {
            this.loadPositions();
            this.$el.addEventListener('submit', submitHandler.bind(this))
            this.form = new Form(this.$el, ['name', 'email', 'phone', 'photo', 'position_id'])
        }
    }

    loadPositions() {
        const positions = axios.get('/api/positions').then(response => {
            this.renderPositions(response.data.positions)
        }).catch(error => {

        })
    }

    renderPositions(positions) {
        const html = positions.map(position => templatePosition(position));
        const container = this.$el.querySelector('#position_id');
        container.insertAdjacentHTML('beforeend', html.join(' '))
    }
}

function templatePosition(position) {
    return `
        <option value="${position.id}">${position.name}</option>
    `
}

async function submitHandler(event) {
    event.preventDefault()

    try {

        this.form.controls.forEach(c => {
            clearError(this.form.form[c])
        })

        const formData = this.form.value()
        const tokenResponse = await axios.get('/api/token')
        const result = await axios.post('/api/users', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'Token': tokenResponse.data.token
            }
        })

        alert("OK")

    } catch (e) {

        switch (e.response.status) {
            case 422:
                const errors = e.response.data.errors;
                Object.keys(errors).forEach(control => {
                    clearError(this.form.form[control])
                    setError(this.form.form[control], errors[control].shift())
                })
                break
            default:
                alert(e.response.data.message)
        }
    }
}

function setError($control, message) {

    const inputWrapper = $control.closest('.form-group');
    if (inputWrapper) {
        clearError($control)
        const error = `<p class="validation-error">${message}</p>`
        inputWrapper.classList.add('invalid')
        $control.insertAdjacentHTML('afterend', error)
    }
}

function clearError($control) {
    const inputWrapper = $control.closest('.form-group');
    if (inputWrapper) {
        inputWrapper.classList.remove('invalid')
        if ($control.nextSibling) {
            $control.closest('.form-group').removeChild($control.nextSibling)
        }
    }


}
