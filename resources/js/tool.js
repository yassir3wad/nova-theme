Nova.booting((Vue, router, store) => {
    router.addRoutes([
        {
            name: 'nova-theme',
            path: '/nova-theme',
            component: require('./components/Tool'),
            props: {resourceName: 'themes'}
        },
    ])
})
