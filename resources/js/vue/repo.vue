<template>
        <td>
            <p>
                <a v-bind:href="repo.url" target="_blank">{{ repo.name }}</a>
            </p>
            <p>ID: {{ repo.repo_id }}</p>
            <p>Owner: {{ repo.owner }}</p>
        </td>
        <td>{{ repo.description }}</td>
        <td>{{ repo.repo_create }}</td>
        <td>{{ repo.last_push }}</td>
        <td>{{ repo.stars }}</td>
</template>

<script>
    export default {
        props: ['repo']
    }
</script>