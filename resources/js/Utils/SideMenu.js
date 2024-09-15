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
                index: '2-1-2'
            },
            {
                title: 'Cargos',
                icon: 'pi pi-wave-pulse',
                link: 'Charge',
                index: '2-1-2'
            },
            {
                title: 'Suppliers',
                icon: 'pi pi-wave-pulse',
                link: 'suppliers',
                index: '2-1-2'
            },
            {
                title: 'Social Media',
                icon: 'pi pi-wave-pulse',
                link: 'socialmedia',
                index: '2-1-2'
            },
            {
                title: 'Estado de Pruducto',
                icon: 'pi pi-wave-pulse',
                link: 'ProductStatus',
                index: '2-1-2'
            },
            {
                title: 'Estado de Compra',
                icon: 'pi pi-wave-pulse',
                link: 'PurchaseStatus',
                index: '2-1-2'
            }
          ]
        }
      ]
    }
  ]


export { items };

