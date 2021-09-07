<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <form @submit.prevent="login">
                            <div class="form-group">
                                <label for="exampleInputEmail1"
                                    >Email address</label
                                >
                                <input
                                    type="email"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    aria-describedby="emailHelp"
                                    v-model="form.email"
                                    placeholder="Enter email"
                                />
                                <small
                                    id="emailHelp"
                                    class="form-text text-muted"
                                    >We'll never share your email with anyone
                                    else.</small
                                >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"
                                    >Password</label
                                >
                                <input
                                    type="password"
                                    class="form-control"
                                    id="exampleInputPassword1"
                                    v-model="form.password"
                                    placeholder="Password"
                                />
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                email: "",
                password: "",
                checked: []
            }
        };
    },
    methods: {
        login() {
            axios
                .post(`/api/login`, this.form)
                .then(response => {
                    console.log(response.data.success.token);
                    localStorage.setItem(
                        "accessToken",
                        response.data.success.token
                    );
                })
                .catch(error => {
                    console.log(error.data);
                });
        }
    },
    mounted() {
        console.log("Component mounted.");
    }
};
</script>
