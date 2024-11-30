import BaseService from "./BaseService";

export default class CustomerService extends BaseService {
    constructor() {
        super('api/customers');

        this.model = {
            id: 0,
            first_names:'',
            last_names:'', 
            dui:'',
            birth_date:'',
            gender_id: null,
            phone:'',
            email:'',
            direcction: ''
        }

        this.rules  =  {
            first_names: [
                { required: true, message: 'Los nombres son obligatorios.', trigger: 'blur' },
                { max: 50, message: 'Los nombres no puede exceder 50 caracteres.', trigger: 'blur' },
            ],
            last_names: [
                { required: true, message: 'Los apellidos son obligatorios.', trigger: 'blur' },
                { max: 50, message: 'Los apellidos no puede exceder 50 caracteres.', trigger: 'blur' },
            ], 
            dui: [
                { required: true, message: 'El número de DUI es obligatorio.', trigger: 'blur' },
                { pattern: /^[0-9]{8}-[0-9]$/, message: 'El DUI debe tener el formato ########-#.', trigger: 'blur' },
            ],
            birth_date: [
                { required: true, message: 'La fecha de nacimiento es obligatoria.', trigger: 'blur' },
                { type: 'date', message: 'La fecha de nacimiento debe ser válida.', trigger: 'blur' },
            ],
            gender_id: [
                { required: true, message: 'El género es obligatorio.', trigger: 'change' },
            ],
            phone: [
                { required: true, message: 'El teléfono es obligatorio.', trigger: 'blur' },
                { pattern: /^[0-9]{8}$/, message: 'El teléfono debe tener 8 dígitos.', trigger: 'blur' },
            ],
            email: [
                { required: true, message: 'El correo electrónico es obligatorio.', trigger: 'blur' },
                { type: 'email', message: 'El correo electrónico debe ser válido.', trigger: 'blur' },
            ],
            direcction: [
                { required: true, message: 'La direccion es obligatorio.', trigger: 'blur' },
                { max: 255, message: 'La direccion no puede exceder 255 caracteres.', trigger: 'blur' },
            ],
        }
        
    }

    async getGenders(){
        let responce = await this.axios.get(`${this.urlApi}/genders`);
        if (responce.status != 200) throw new Error('Error loading data');
        return responce.data;
    }
}