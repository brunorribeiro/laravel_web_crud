<script setup>
    import useClientes from '../../composables/clientes';
    import useEmpresas from '../../composables/empresas';
    import { onMounted } from 'vue';

    const { empresas, getEmpresas } = useEmpresas();
    const { cliente, getCliente, updateCliente, errors } = useClientes();

    const props = defineProps({
        id: {
            "required": true,
            "type": String
        }
    });

    onMounted(() => {
        getCliente(props.id);
        getEmpresas();
    })
</script>
<template>
    <div class="mt-12">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white flex justify-center">Editando um cliente</h2>
        <form class="max-w-md mx-auto p-4 bg-white shadow-md rounded-md" @submit.prevent="updateCliente($route.params.id)">
            <div class="space-y-6">
                <div class="mb-5">
                    <label for="razao_social" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" v-bind:class="errors.razao_social ? 'text-sm font-medium text-red-700 dark:text-red-500' : ''">Razão Social</label>
                    <input type="text" id="razao_social" v-model="cliente.razao_social" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" v-bind:class="errors.razao_social ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400' : ''" placeholder="Cliente de Exemplo">
                    <div v-if="errors.razao_social">
                        <span class="text-sm text-red-400">{{ errors.razao_social[0] }}</span>
                    </div>
                </div>
            </div>
            <div class="space-y-6 mb-2">
                <label for="tipo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecione o tipo</label>
                <select id="tipo" v-model="cliente.tipo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" selected></option>
                    <option value="PF">Pessoa Física</option>
                    <option value="PJ">Pessoa Jurídica</option>
                </select>
            </div>
            <div class="space-y-6">
                <div class="mb-5">
                    <label for="cpf_cnpj" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" v-bind:class="errors.cpf_cnpj ? 'text-sm font-medium text-red-700 dark:text-red-500' : ''">Razão Documento</label>
                    <input type="text" id="cpf_cnpj" v-model="cliente.cpf_cnpj" v-mask="cliente.tipo == 'PF'? '###.###.###-##': '##.###.###/####-##'" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" v-bind:class="errors.cpf_cnpj ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400' : ''" placeholder="" masked="false">
                    <div v-if="errors.cpf_cnpj">
                        <span class="text-sm text-red-400">{{ errors.cpf_cnpj[0] }}</span>
                    </div>
                </div>
            </div>
            <div class="space-y-6 mb-2">
                <label for="empresa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecione a empresa</label>
                <select id="empresa" v-model="cliente.empresa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                    <option v-for="empresa in empresas" :key="empresa.id" :value="empresa.id" selected>{{ empresa.razao_social }}</option>
                </select>
            </div>
            <button type="submit" class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Editar Cliente</button>
        </form>

    </div>
</template>