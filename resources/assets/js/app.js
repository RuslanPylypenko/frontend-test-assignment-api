import './bootstrap';
import UsersComponent from "./components/UsersComponent";

const Users = new UsersComponent('users-list')

document.addEventListener('DOMContentLoaded', function () {

    Users.load();

})


