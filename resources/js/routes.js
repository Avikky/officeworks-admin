const routes = [{
        path: '/dashboard',
        component: require('./pages/Dashboard.vue').default
    },
    {
        path: '/profile',
        component: require('./pages/Profile.vue').default
    },

    {
        path: '/projects',
        component: require('./pages/Projects.vue').default
    },

    {
        path: '/admin',
        component: require('./pages/Admin.vue').default
    },

    {
        path: '/admin-role',
        component: require('./pages/AdminRole.vue').default
    },

    {
        path: '/income',
        component: require('./pages/Income.vue').default,
        children: [{
            path: '/add-income',
            component: require('./components/AddIncome.vue').default
        }],
    },

    {
        path: '/expenditure',
        component: require('./pages/Expenditure.vue').default
    },

    {
        path: '/account-statement',
        component: require('./pages/AccountStatement.vue').default
    },

    {
        path: '/monthly-report',
        component: require('./pages/MonthlyReport.vue').default
    },

    {
        path: '/daily-report',
        component: require('./pages/DailyReport.vue').default
    },

    {
        path: '/project-report',
        component: require('./pages/ProjectReport.vue').default
    },
    {
        path: '/announcement',
        component: require('./pages/Announcement.vue').default
    },

    {
        path: '/leave-request',
        component: require('./pages/LeaveRequest.vue').default
    },

    {
        path: '/other-request',
        component: require('./pages/OtherRequest.vue').default
    },

    {
        path: '/all-staff',
        component: require('./pages/AllStaff.vue').default
    },

    {
        path: '/staff-position',
        component: require('./pages/StaffPosition.vue').default
    },

    {
        path: '/department-sections',
        component: require('./pages/DepartmentSections.vue').default
    },
    {
        path: '/department',
        component: require('./pages/Department.vue').default
    },
    {
        path: '/view-department/:id/:name',
        name: 'view',
        component: require('./pages/ViewDepartment.vue').default
    },
    {
        path: '/employee/:id/:name/',
        name: 'staff',
        component: require('./pages/Employee.vue').default
    },
];

export default routes;
