import axios from "axios";
import { ref } from "vue";

const gender = {
    id: 0,
    name: "",
    status: true
};

const service = {}

service.ToModel  = (form) => {
    return {
        id: form.id || 0,
        name: form.name,
        status: form.status
    }
}

service.getAll = async () => {
    let responce = await axios.get('/api/generes')
    if(responce.status != 200) throw new Error('Error al cargar los generos')
    let paginationData = responce.data
    return paginationData
}


service.create = async (data) => {
    let responce = await axios.post('/api/generes', data)
    if(responce.status != 201) throw new Error('Error al crear el genero')
    return responce.data
}

service.update = async (id, data) => {
    let responce = await axios.put(`/api/generes/${id}`, data)
    if(responce.status != 200) throw new Error('Error al actualizar el genero')
    return responce.data
}

service.updateStatus = async (id) => {
    let responce = await axios.patch(`/api/generes/${id}`)
    if(responce.status != 204) throw new Error('Error al actualizar el estado de el genero')
}

service.delete = async (id) => {
    let responce = await axios.delete(`/api/generes/${id}`)
    if(responce.status != 204) throw new Error('Error al eliminar el genero')
    return responce.data
}


export { gender, service };
