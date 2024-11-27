import BaseService from "./BaseService";

export default class StoreBranchService extends BaseService {
    constructor(){
        super('api/storeBranches');
        this.model = {
            id: 0, 
            logo:'',
            description:'',
            name:'',
            NIT:'', 
            opening_date:'',
        }

        this.rules = {
            logo: [
              { required: true, message: 'The logo is required.', trigger: 'change' },
              { type: 'string', message: 'The logo must be a valid string.', trigger: 'change' }
            ],
            name: [
              { required: true, message: 'The name is required.', trigger: 'blur' },
              { min: 3, message: 'The name must be at least 3 characters long.', trigger: 'blur' },
              { max: 50, message: 'The name must not exceed 50 characters.', trigger: 'blur' }
            ],
            NIT: [
              { required: true, message: 'The NIT is required.', trigger: 'blur' },
              { type: 'string', message: 'The NIT must be a valid string.', trigger: 'blur' },
              { min: 6, message: 'The NIT must be at least 6 characters long.', trigger: 'blur' },
              { max: 20, message: 'The NIT must not exceed 20 characters.', trigger: 'blur' }
            ],
            description: [
              { required: true, message: 'The description is required.', trigger: 'blur' },
              { min: 10, message: 'The description must be at least 10 characters long.', trigger: 'blur' },
              { max: 255, message: 'The description must not exceed 255 characters.', trigger: 'blur' }
            ],
            opening_date: [
              { required: true, message: 'The opening date is required.', trigger: 'change' },
              { type: 'date', message: 'The opening date must be a valid date.', trigger: 'change' }
            ]
          };
          
    }
}