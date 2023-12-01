import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

axios.defaults.baseURL = "http://127.0.0.1:8000/api/v1/"

export default function useClientes() {

    const clientes = ref([]);
    const cliente = ref([]);
    const errors = ref([]);
    const router = useRouter();

    const getClientes = async () => {
        const response = await axios.get("clientes");
        clientes.value = response.data.data;
    };

    const getCliente = async (id) => {
        const response = await axios.get(`clientes/${id}`);
        cliente.value = response.data.data;
    }

    const storeCliente = async (data) => {
        try {
            await axios.post("clientes", data);
            await router.push({name: "ClienteIndex"});
        } catch (error) {
            if(error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    }

    const updateCliente = async (id) => {
        try {
            await axios.put(`clientes/${id}`, cliente.value);
            await router.push({name: "ClienteIndex"});
        } catch (error) {
            if(error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    }

    const destroyCliente = async (id) => {
        if (!window.confirm("Tem certeza que quer deletar esse registro?")) return;
        await axios.delete(`clientes/${id}`);
        await getClientes();
    }

    return {
        cliente,
        clientes,
        getCliente,
        getClientes,
        storeCliente,
        updateCliente,
        destroyCliente,
        errors
    }
}