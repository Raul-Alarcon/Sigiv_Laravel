import BaseService from "./BaseService";

export default class PurchaseService extends BaseService {
    constructor(){
        super('api/purchase')

        this.model = {
            id: 0,
            invoice_number:'', 
            purchase_date:'', 
            purchase_status_id: null,
            total:'',
            user_id: null, 
            supplier_id: null
        } 
        
          
    }

     async getSuppliers() { 
        let responce = await axios.get(`${this.urlApi}/suppliers`);
        if (responce.status != 200) throw new Error('Error loading data');
        return responce.data;
    }
}
