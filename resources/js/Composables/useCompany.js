import CompanyService from '@/Services/CompanyService';  
import { reactive, ref } from 'vue';
import { ElMessage } from 'element-plus'; 

export default function useCompany(service) {
    const company = reactive({ ...service.model });
    const rules = reactive({ ...service.rules });
    const companies = ref([]);
    const loadings = reactive({
        table: false,
        modal: false,
    });

 


    const main = async () => {
        try {
            loadings.table = true;
            let response = await service.getAll();
            companies.value = response.data;
        } catch (error) {
            ElMessage({
                type: 'error',
                message: error.message
            });
        }
        loadings.table = false;
    }

    return {
        companies, 
        loadings,
        main, 
        company, 
        rules
    }

}
