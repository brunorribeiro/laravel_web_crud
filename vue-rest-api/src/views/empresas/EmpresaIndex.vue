<script setup>
    import useEmpresas from '../../composables/empresas';
    import { onMounted } from 'vue';

    const { empresas, getEmpresas, destroyEmpresa } = useEmpresas();

    onMounted(() => getEmpresas());
</script>
<template>
    <div class="mt-12">

        <div class="flex justify-end my-2">

            <RouterLink :to="{ name: 'EmpresaCreate' }" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded text-white">Nova Empresa</RouterLink>
        
        </div>
        <div class="relative overflow-x-auto">

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Empresa (Razão Social)
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Sigla
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="empresa in empresas" :key="empresa.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{ empresa.razao_social }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-indigo-400 border border-indigo-400 text-center">
                                {{ empresa.sigla }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <RouterLink :to="{ name: 'EmpresaEdit', params: {id: empresa.id }}" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-100 dark:bg-yellow-500 dark:hover:bg-yellow-500 dark:focus:ring-yellow-600 mr-2">Editar</RouterLink>
                            <button @click="destroyEmpresa(empresa.id)" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-red-500 rounded-lg hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-100 dark:bg-red-500 dark:hover:bg-red-500 dark:focus:ring-red-600">Excluir</button>

                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

    </div>
</template>