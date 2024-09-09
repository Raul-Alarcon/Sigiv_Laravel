import axios from 'axios'

const category = {
    id: 0,
    name: '',
    description: '',
    status : true
}


const service = {}

service.categories = []

service.ToModel  = (form) => {
    return {
        id: form.id || 0,
        name: form.name,
        description: form.description,
        status: form.status
    }
}

service.getAll = async () => {
    let responce = await axios.get('/api/categories')
    if(responce.status != 200) throw new Error('Error al cargar las categorias')
    let paginationData = responce.data
    return paginationData
}


service.create = async (data) => {
    let responce = await axios.post('/api/categories', data)
    if(responce.status != 201) throw new Error('Error al crear la categoria')
    return responce.data
}

service.update = async (id, data) => {
    let responce = await axios.put(`/api/categories/${id}`, data)
    if(responce.status != 200) throw new Error('Error al actualizar la categoria')
    return responce.data
}

service.updateStatus = async (id) => {
    let responce = await axios.patch(`/api/categories/${id}`)
    if(responce.status != 204) throw new Error('Error al actualizar el estado de la categoria')
}

service.delete = async (id) => {
    let responce = await axios.delete(`/api/categories/${id}`)
    if(responce.status != 204) throw new Error('Error al eliminar la categoria')
    return responce.data
}



export { category, service }
