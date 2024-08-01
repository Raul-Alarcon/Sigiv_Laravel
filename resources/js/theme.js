import { definePreset } from '@primevue/themes'; 
import Aura from '@primevue/themes/aura';

export const custon_presets = definePreset(Aura, { 
    semantic: { 
        colorScheme: {
            // light: {
            //     surface: {
            //         0: '#00000',
            //         50: '{zinc.50}',
            //         100: '{zinc.100}',
            //         200: '{zinc.200}',
            //         300: '{zinc.300}',
            //         400: '{zinc.400}',
            //         500: '{zinc.500}',
            //         600: '{zinc.600}',
            //         700: '{zinc.700}',
            //         800: '{zinc.800}',
            //         900: '{zinc.900}',
            //         950: '{zinc.950}'
            //     },
            //     primary: {
            //         color: '{zinc.950}',
            //         inverseColor: '#ffffff',
            //         hoverColor: '{zinc.900}',
            //         activeColor: '{zinc.800}'
            //     },
            //     highlight: {
            //         background: '{zinc.950}',
            //         focusBackground: '{zinc.700}',
            //         color: '#ffffff',
            //         focusColor: '#ffffff'
            //     }
            // },
            dark: {
                surface: {
                    0: '#ffffff',
                    50: '{slate.50}',
                    100: '{slate.100}',
                    200: '{slate.200}',
                    300: '{slate.300}',
                    400: '{slate.400}',
                    500: '{slate.500}',
                    600: '{slate.600}',
                    700: '{slate.700}',
                    800: '{slate.800}',
                    900: '{slate.900}',
                    950: '{slate.950}'
                }, 

                formField: { 
                    background: '{slate.800}',
                }
            }
        }
    }
})
