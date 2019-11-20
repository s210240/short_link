<template>
    <div class="container justify-content-center">
        <div class="row justify-content-center">
            <form class="form-signin">
                <h1 class="h3 mb-3 font-weight-normal">Please paste Link</h1>
                <input type="text" id="inputLink" class="form-control" placeholder="Link" v-model="inputLink" autofocus>
                <p></p>
                <p class="justify-content-center">
                    {{ shortLink }}
                </p>
                <img class="justify-content-center" src="" width="200px" height="200px"/>
                <p></p>
                <div class="btn btn-lg btn-primary btn-block" v-on:click="sendLink()">Generate</div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "LinkComponent",

        data: function () {
            return {
                errors: [],
                inputLink: "",
                shortLink: " "
            }
        },

        props: ['tokenData'],

        methods: {
            sendLink() {
                let app = this;
                let token = app.tokenData;

                let link = this.inputLink;

                axios.post('/save_link', {
                    link: link,
                    _token: token
                })
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        if (error.response.status === 422) {
                            app.shortLink = error.response.data.errors.link[0];
                        }
                    })
                    .finally(function () {
                        // always executed
                    });
            }
        }
    }
</script>

<style scoped>

</style>
