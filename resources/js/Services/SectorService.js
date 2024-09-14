import BaseService from "./BaseService.js";

export default class SectorService extends BaseService{

    constructor(){
        super('api/sectors');

        this.model = {
            id: 0,
            name: '',
            description: '',
            status: true
        }

        this.rules = {
            name: [
                { required: true, message: 'The name is required', trigger: 'blur' },
                { min: 3, message: 'The name must be at least 3 characters long ', trigger: 'blur' },
                { max: 50, message: 'The name must be no longer than 50 characters', trigger: 'blur' }
            ],
            description: [
                { required: true, message: 'The description is required', trigger: 'blur' },
                { min: 20, message: 'The description must be at least 20 characters long', trigger: 'blur' },
                { max: 255, message: 'The description must be no longer than 255 characters', trigger: 'blur' }
            ]
        }
    }
}
