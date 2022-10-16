const Ziggy = {"url":"http:\/\/inertia.test","port":null,"defaults":{},"routes":{"sanctum.csrf-cookie":{"uri":"sanctum\/csrf-cookie","methods":["GET","HEAD"]},"ignition.healthCheck":{"uri":"_ignition\/health-check","methods":["GET","HEAD"]},"ignition.executeSolution":{"uri":"_ignition\/execute-solution","methods":["POST"]},"ignition.updateConfig":{"uri":"_ignition\/update-config","methods":["POST"]},"customer":{"uri":"customer","methods":["GET","HEAD"]},"customer.destroy":{"uri":"customer\/{id}","methods":["DELETE"]},"customer.create":{"uri":"customer\/create","methods":["GET","HEAD"]},"customer.store":{"uri":"customer\/store","methods":["POST"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
