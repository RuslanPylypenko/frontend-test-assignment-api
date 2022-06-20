export default class Form {
    constructor(form, controls) {
        this.form = form;
        this.controls = controls;
    }

    value() {
        const value = new FormData();
        this.controls.forEach(control => {
            if (control === 'photo') {
                value.append(control, this.form[control].files[0])
            } else {
                value.append(control, this.form[control].value)
            }
        })
        return value;
    }

    clear() {
        Object.keys(this.controls).forEach(control => {
            if (this.form[control].tagName === "SELECT") {
                this.form[control].selectedIndex = 0
            } else {
                this.form[control].value = ''
            }
        })
    }

    setValues(values) {
        Object.keys(this.controls).forEach(control => {
            this.form[control].value = values[control]
        })
    }
}
