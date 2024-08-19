import axios from 'axios'

const charger = {
    id: 0,
    name: "",
    status: false
}
const service = {}

service.ToModel  = (form) => {
    return {
        id: form.id || 0,
        name: form.name, 
        status: form.status
    }
}

service.getAll = async () => { 
    let responce = await axios.get('/api/charges')
    if(responce.status != 200) throw new Error('Error al cargar las cargoss')
    let paginationData = responce.data
    return paginationData
}


service.create = async (data) => {  
    let responce = await axios.post('/api/charges', data)
    if(responce.status != 201) throw new Error('Error al crear la cargos')
    return responce.data
}

service.update = async (id, data) => {
    let responce = await axios.put(`/api/charges/${id}`, data)
    if(responce.status != 200) throw new Error('Error al actualizar la cargos')
    return responce.data
}

service.updateStatus = async (id) => {
    let responce = await axios.patch(`/api/charges/${id}`)
    if(responce.status != 204) throw new Error('Error al actualizar el estado del cargos') 
}

service.delete = async (id) => {
    let responce = await axios.delete(`/api/charges/${id}`)
    if(responce.status != 204) throw new Error('Error al eliminar el cargos')
    return responce.data
}


export { charger,  service}