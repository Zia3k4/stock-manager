<template>
    <Link :href="route('dashboard')" class="btn btn-secondary">Voltar</Link>

    <div>
        <h1>Funcionários</h1>
        <InertiaLink :href="route('funcionarios.create')" class="btn btn-primary">Novo Funcionário</InertiaLink>
        <table>
            <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Cargo</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="f in funcionarios" :key="f.id">
                <td>{{ f.nome }}</td>
                <td>{{ f.email }}</td>
                <td>{{ f.cargo }}</td>
                <td>
                    <InertiaLink :href="route('funcionarios.edit', f.id)">Editar</InertiaLink>
                    <InertiaLink :href="route('funcionarios.show', f.id)">Ver</InertiaLink>
                </td>
            </tr>
            </tbody>
        </table>
        <h1>oi tudo bem</h1>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
defineProps({
    funcionarios: {
        type: Array,
        required: true,
        default: () => [],
        validator(arr) {
            return arr.every(f => f.id && f.nome && f.email && f.cargo)
        }
    }

})

</script>
