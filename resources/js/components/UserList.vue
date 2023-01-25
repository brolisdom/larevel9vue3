<template>
    <div class="container mt-2">
        <div class="list-group" v-for="user in users" :key="user.id">
            <button type="button" class="list-group-item list-group-item-action mb-2" data-bs-toggle="modal" data-bs-target="#modal" @click="setAction(user)">
                <h5>{{ user.name }}</h5>
                <p>{{ user.email }}</p>
            </button>
        </div>
    </div>
    <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#modal" @click="setAction()">Add new user</button>

    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal">User modal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ref="exit"></button>
            </div>
            <div class="modal-body">
                <input class="form-control mb-2" type="text" placeholder="User name" v-model="user.name">
                <input class="form-control mb-2" type="email" placeholder="User email" v-model="user.email">
                <input type="hidden" v-model="user.id" v-if="delete">
                <input class="form-control mb-2" type="password" placeholder="User password" v-model="user.password" v-else="delete">
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-primary" @click="saveUser()">Save</button>
                <button type="button" class="btn btn-secondary" v-if="delete" @click="deleteUser()">Delete</button>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    const id = document.getElementById("user-id").value;

    const newUser = {
        id: 0,
        name: "",
        email: "",
        password: ""
    }

    export default {
        data () {
            return {
                users: [],
                user: newUser,
                delete: true,
            }
        }, 
        methods: {
            setAction(user = false) {
                this.delete = user ? true : false;
                this.user = user ? user : newUser;
            },
            getUsers() {
                this.$refs.exit.click();
                axios.get('/api/getUsers').then((response) => {
                    this.users = response.data;
                })
            },
            saveUser() {
                if (!this.validate()) 
                    return alert("Please fill all the fields correctly")
                const action = this.user.id ? 'updateUser' : 'createUser';
                axios.post('/api/'+action, this.user)
                    .then((response) => {
                        this.getUsers();
                    }).catch((error) => {
                        alert("The email is already in use");
                    });
            },
            deleteUser() {
                if (id == this.user.id) 
                    return alert("You can't delete your own user");
                axios.post('/api/deleteUser', this.user)
                    .then((response) => {
                        this.getUsers();
                    });
            }, 
            validate() {
                if (!this.user.name) return false;
                if (!this.user.id && this.user.password.length < 8) return false;
                if (!this.user.email) return false;
                else return (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.user.email))
            },
        },
        mounted() {
            this.getUsers();
        }
    }
</script>
