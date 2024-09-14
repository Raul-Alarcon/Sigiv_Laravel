import axios from "axios";

const sector = {
    name: "",
    description: "",
    status: false
};

const services = {};
services.updateStatus = async (id) => {
    const result = await axios.patch(`/sectors/${id}`)
    return result.data;
};

services.store = async (data) => {
    const result = await axios.post("/sectors", data);
    return result.data;
}

services.delete = async (id) => {
    const result = await axios.delete(`/sectors/${id}`);
    return result.data;
}

services.update = async (data) => {
    const result = await axios.put(`/sectors/${data.id}`, data);
    return result.data;
}


export { sector, services };
