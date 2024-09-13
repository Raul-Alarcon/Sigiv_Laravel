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
            }
          ]
        }
      ]
    }
  ]


export { items };

