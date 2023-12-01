<script setup>
    import useEmpresas from '../../composables/empresas';
    import useClientes from '../../composables/clientes';
    import { onMounted, toRaw } from 'vue';
    let { empresas, getEmpresas } = useEmpresas();
    const { clientes, getClientes, destroyCliente } = useClientes();

    const DocumentPersonBrFilter = (documentId, documentType) => {
        documentId = typeof documentId != 'string' ? documentId.toString() : documentId;
        if (documentType == 'PJ') {
            documentId = documentId.padStart(14, '0');
            documentId = documentId.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
        } else {
            documentId = documentId.padStart(11, '0');
            documentId = documentId.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
        }

        return documentId;
    }
    
    onMounted(async () => {
        await getClientes();
        await getEmpresas();
    });
</script>
<template>
    <div class="mt-12">

        <div class="flex justify-end my-2">

            <RouterLink :to="{ name: 'ClienteCreate' }" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded text-white">Novo Cliente</RouterLink>

        </div>
        <div class="relative overflow-x-auto">

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Cliente (Razão Social)
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Tipo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Documento
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Empresa
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="cliente in clientes" :key="cliente.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{ cliente.razao_social }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-indigo-400 border border-indigo-400 text-center">
                                {{ cliente.tipo == "PF" ? 'Pessoa Física' : 'Pessoa Jurídica' }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            {{ DocumentPersonBrFilter(cliente.cpf_cnpj, cliente.tipo) }}
                        </td>
                        <td class="px-6 py-4" >
                            <span v-for="empresa in empresas" :key="empresa.id">{{ empresa.id == cliente.empresa ? empresa.razao_social : '' }}</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <RouterLink :to="{ name: 'ClienteEdit', params: {id: cliente.id }}" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-100 dark:bg-yellow-500 dark:hover:bg-yellow-500 dark:focus:ring-yellow-600 mr-2">Editar</RouterLink>
                            <button @click="destroyCliente(cliente.id)" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-red-500 rounded-lg hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-100 dark:bg-red-500 dark:hover:bg-red-500 dark:focus:ring-red-600">Excluir</button>

                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

    </div>
</template>