<template>
    <h1>Popular PHP Repositories on GitHub</h1>
    <p>Use the "Update Repo List" to download a list of the top 1000 most-starred public PHP projects on GitHub. Clicking the button a second time will update the list, but not delete older entries. The table only shows the top 1000 entries by star count.</p>
    <a class="btn btn-blue" href="repos">Update Repo List</a>
    <table>
            <thead>
                <tr>
                    <th width="20%">Repository</th>
                    <th width="45%">Description</th>
                    <th width="15%">Creation Date</th>
                    <th width="15%">Last Push</th>
                    <th width="5%">Total Stars</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(repo, id) in repos" :key="id">
                    <repo
                        :repo="repo"
                        />
                </tr>
            </tbody>
        </table>
</template>

<script>
    import repo from './repo.vue'

    export default {
        components: {
            repo
        },
        data: function() {
            return {
                repos: []
            }
        },
        methods: {
            getRepos() {
                axios.get('json')
                .then( response => {
                    this.repos = response.data
                    console.log(this.repos)
                })
                .catch(error => {
                    console.log(error)
                })
            }
        },
        created() {
            this.getRepos()
        }
    }
</script>