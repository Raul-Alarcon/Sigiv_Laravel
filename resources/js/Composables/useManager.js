import { ref, reactive } from 'vue';
import { ElMessage } from 'element-plus';

export default function useManager(service) {
    const model = reactive({ ...service.model });
    const entities = ref([]);
    const rules = reactive({ ...service.rules });


    const opc = reactive({
        table: false,
        modal: false,
        loading: false
    });

    const Main = async () => {
        try {
            opc.table = true;
            let response = await service.getAll();
            entities.value = response.data;
        } catch (error) {
            service.opcElMessage.type = 'error';
            service.opcElMessage.message = error.message;
            ElMessage(service.opcElMessage);
        }
        opc.table = false;
    };

    const openModal = () => {
        Object.assign(model, service.model);
        opc.modal = true;
    };

    const handlerUpdate = async (elForm) => {
        try {
            opc.loading = true;
            let sector = await service.update(model.id, model);
            let index = entities.value.findIndex((sector) => sector.id === model.id);
            entities.value[index] = sector;
            opc.modal = false;
            opc.loading = false;
        } catch (error) {
            service.opcElMessage.type = 'error';
            service.opcElMessage.message = error.message;
        }

        opc.modal = false;
        opc.loading = false;
        elForm.resetFields();
        ElMessage(service.opcElMessage);
    };

    const handlerChangeStatus = async (row) => {
        try {
            opc.table = true;
            await service.updateStatus(row.id);
            opc.table = false;
        } catch (error) {

            const index = entities.value.findIndex(entity => entity.id === row.id)
            const entity = entities.value[index];
            entity.status = !entity.status;
            entities.value[index] = entity;

            service.opcElMessage.type = 'error';
            service.opcElMessage.message = error.message;
        }

        opc.table = false;
        ElMessage(service.opcElMessage);
    };

    const handlerPost = async (elForm) => {
        try {
            opc.loading = true;
            let sector = await service.create(model);
            entities.value.push(sector);
            opc.modal = false;
            opc.loading = false;
        } catch (error) {
            service.opcElMessage.type = 'error';
            service.opcElMessage.message = error.message;
        }

        opc.modal = false;
        opc.loading = false;
        elForm.resetFields();
        ElMessage(service.opcElMessage);
    };

    const handerSubmit = async (elForm) => {
        try {
            if (model.id !== 0) {
                await handlerUpdate(elForm);
            } else {
                await handlerPost(elForm);
            }
        } catch (error) {
            console.log(error);
        }
    };

    const handlerEdit = (row) => {
        Object.assign(model, row);
        opc.modal = true;
    };

    const handerDelete = async (row) => {
        try {
            opc.table = true;
            await service.delete(row.id);
            entities.value = entities.value.filter((entity) => entity.id !== row.id);
        } catch (error) {
            service.opcElMessage.type = 'error';
            service.opcElMessage.message = error.message;
        }

        opc.table = false;
        ElMessage(service.opcElMessage);
    };

    const handlerInputEnter = async (value) => {
        try {
            opc.table = true;
            let response = await service.search(value);
            entities.value = response.data;
        } catch (error) {
            service.opcElMessage.type = 'error';
            service.opcElMessage.message = error.message;
        }
        ElMessage(service.opcElMessage);
        opc.table = false;
    };

    return {
        model,
        entities,
        opc,
        rules,
        Main,
        openModal,
        handerSubmit,
        handlerEdit,
        handerDelete,
        handlerChangeStatus,
        handlerInputEnter,
    };
}
