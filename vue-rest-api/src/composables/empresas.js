import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

axios.defaults.baseURL = "http://127.0.0.1:8000/api/v1/"

export default function useEmpresas() {

    const empresas = ref([]);
    const empresa = ref([]);
    const errors = ref([]);
    const router = useRouter();

    const getEmpresas = async () => {
        const response = await axios.get("empresas");
        empresas.value = response.data.data;
    };

    const getEmpresa = async (id) => {
        const response = await axios.get(`empresas/${id}`);
        empresa.value = response.data.data;
    }

    const storeEmpresa = async (data) => {
        try {
            await axios.post("empresas", data);
            await router.push({name: "EmpresaIndex"});
        } catch (error) {
            if(error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    }

    const updateEmpresa = async (id) => {
        try {
            await axios.put(`empresas/${id}`, empresa.value);
            await router.push({name: "EmpresaIndex"});
        } catch (error) {
            if(error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    }

    const destroyEmpresa = async (id) => {
        if (!window.confirm("Tem certeza que quer deletar esse registro?")) return;
        await axios.delete(`empresas/${id}`);
        await getEmpresas();
    }

    return {
        empresa,
        empresas,
        getEmpresa,
        getEmpresas,
        storeEmpresa,
        updateEmpresa,
        destroyEmpresa,
        errors
    }
}