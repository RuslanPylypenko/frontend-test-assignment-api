export default class UsersComponent {
    constructor(id) {
        this.$el = document.getElementById(id);
        this.$el.addEventListener('click', loadMoreHandler.bind(this))
    }

    async load() {
        const response = await axios.get('/api/users')
        console.log(response);
        this.render(response.data.users)
    }


    render(users) {
        const html = users.map(user => templateUser(user));
        const container = this.$el.querySelector('tbody');
        container.innerHTML = '';
        container.insertAdjacentHTML('afterbegin', html.join(' '))
    }
}

function loadMoreHandler(event) {

}

function templateUser(user) {
    return `
        <tr>
            <td>${user.id}</td>
            <td>${user.name}</td>
            <td>${user.email}</td>
            <td>${user.phone}</td>
            <td><img src="${user.photo}" alt="${user.name}" class="image"></td>
            <td>${user.position.name}</td>
        </tr>
    `
}
