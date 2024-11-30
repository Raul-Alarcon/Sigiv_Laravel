import BaseService from "./BaseService";

export default class ApplicationStatusService extends BaseService{
    constructor() {
        super('api/applicationStatuses');

        this.model = {
            id: 0, 
            name: '', 
            description: ''
        } 

        this.rules = {
            name: [
                { required: true, message: 'El nombre es obligatorio.', trigger: 'blur' },
                { max: 100, message: 'El nombre no puede exceder 100 caracteres.', trigger: 'blur' },
            ],
            description: [
                { required: true, message: 'La descripción es obligatoria.', trigger: 'blur' },
                { max: 255, message: 'La descripción no puede exceder 255 caracteres.', trigger: 'blur' },
            ],
        }
    }
}