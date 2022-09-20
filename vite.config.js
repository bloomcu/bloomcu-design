import { defineConfig } from 'vite'
import path from 'path'
import vue from '@vitejs/plugin-vue'
 
export default defineConfig({
  plugins: [
    vue(),
  ],
  
  build: {
    rollupOptions: {
      output: {
        entryFileNames: `assets/[name].js`,
        chunkFileNames: `assets/[name].js`,
        assetFileNames: `assets/[name].[ext]`
      }
    }
  },
  
  resolve: {
      alias: {
          '@': `${path.resolve(__dirname, 'src')}`,
      }
  },

  // server: {
  //   strictPort: true,
  //   port: 3000
  // },
})
