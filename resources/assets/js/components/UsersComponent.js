export default class UsersComponent {
    constructor(id) {
        this.$el = document.getElementById(id);

        if(this.$el){
            document.getElementById('load-more').addEventListener('click', loadMoreHandler.bind(this))
            this.load()
        }
    }

    async load(page = 1) {
        const response = await axios.get('/api/users', {params: {page}})
        this.render(response.data.users)
    }


    render(users) {
        const html = users.map(user => templateUser(user));
        const container = this.$el.querySelector('tbody');
        container.insertAdjacentHTML('beforeend', html.join(' '))
    }
}

function loadMoreHandler(event) {
    event.target.dataset.page = parseInt(event.target.dataset.page) + 1

    this.load(event.target.dataset.page)
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
