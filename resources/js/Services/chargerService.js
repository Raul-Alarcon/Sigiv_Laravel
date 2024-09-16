import BaseService from "./BaseService";

export default class chargerService extends BaseService{
    constructor(){
        super ('api/charges');

        this.model = {
            id: 0,
            name: '',
            status: true
        }

        this.rules = {
            name: [
                { required: true, message: 'The name is required', trigger: 'blur' },
                { min: 3, message: 'The name must be at least 3 characters long ', trigger: 'blur' },
                { max: 15, message: 'The name must be no longer than 15 characters', trigger: 'blur' }
            ]
        }
    }
}
