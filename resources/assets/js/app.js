import './bootstrap';
import UsersComponent from "./components/UsersComponent";
import UsersFormComponent from "./components/UsersFormComponent";


document.addEventListener('DOMContentLoaded', function () {
    const Users = new UsersComponent('users-list')

    const UsersForm = new UsersFormComponent('create-user-form')

})


