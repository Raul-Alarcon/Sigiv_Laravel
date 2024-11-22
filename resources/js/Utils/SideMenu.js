const items = [
  {
    title: 'DashBoard',
    link: "dashboard",
    index: '1'
  },
  {
    title: 'Administracion',
    index: '2',
    items: [
      {
        title: 'Catalogos',
        icon: 'pi pi-th-large',
        index: '2-1',
        subItems: [
          {
            title: 'Sectores',
            icon: 'pi pi-wave-pulse',
            link: 'sectors',
            index: '2-1-1'
          },
          {
            title: 'Categorias',
            icon: 'pi pi-wave-pulse',
            link: 'categories',
            index: '2-1-2'
          },
          {
            title: 'Generos',
            icon: 'pi pi-wave-pulse',
            link: 'generes',
            index: '2-1-3'
          },  
          {
            title: 'Social Media',
            icon: 'pi pi-wave-pulse',
            link: 'socialmedia',
            index: '2-1-5'
          },
          {
            title: 'Estado de Producto',
            icon: 'pi pi-wave-pulse',
            link: 'ProductStatus',
            index: '2-1-6'
          },
          {
            title: 'Estado de Compra',
            icon: 'pi pi-wave-pulse',
            link: 'PurchaseStatus',
            index: '2-1-7'
          }
        ]
      },
      {
        title: 'Empresa',
        icon: 'pi pi-th-large',
        index: '2-2',
        subItems: [
          {
            title: 'Gestion Empresa',
            icon: 'pi pi-wave-pulse',
            link: 'campanies',
            index: '2-2-1'
          },

          {
            title: 'Gestion Clientes',
            icon: 'pi pi-wave-pulse',
            link: 'customers',
            index: '2-2-2'
          },

          {
            title: 'Gestion Empleados',
            icon: 'pi pi-wave-pulse',
            link: 'employee',
            index: '2-2-3'
          },
          {
            title: 'Gestion Cargos',
            icon: 'pi pi-wave-pulse',
            link: 'charge',
            index: '2-2-4'
          }, 
          {
            title: 'Gestion Proveedores',
            icon: 'pi pi-wave-pulse',
            link: 'supplier',
            index: '2-2-5'
          }, 
          {
            title: 'Gestion Usuarios',
            icon: 'pi pi-wave-pulse',
            link: 'users',
            index: '2-2-6'
          },
        ]
      }, 

       

    ]
  }
];

export { items };

