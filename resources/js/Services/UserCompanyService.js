import BaseService from "./BaseService";

export default class UserCompanyService extends BaseService {

    constructor(){
        super('api/userCompany');

        this.model = {
            id: 0,
            name: '',
            email: '',
            password: ""
        }

        this.rules = {
            name: [
                { required: true, message: 'The name is required', trigger: 'blur' },
                { min: 10, message: 'The name must be at least 3 characters long ', trigger: 'blur' },
                { max: 50, message: 'The name must be no longer than 50 characters', trigger: 'blur' }
            ],
            email: [
                { required: true, message: 'The email is required', trigger: 'blur' },
                { min: 20, message: 'The email must be at least 20 characters long', trigger: 'blur' },
                { max: 255, message: 'The email must be no longer than 255 characters', trigger: 'blur' }
            ], 
            password: [
                { required: true, message: 'The password is required', trigger: 'blur' },
                { min: 8, message: 'The password must be at least 8 characters long', trigger: 'blur' },
                { max: 20, message: 'The password must be no longer than 20 characters', trigger: 'blur' }
            ]
        }

    }

}