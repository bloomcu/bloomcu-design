import { defineConfig } from 'vite'
import path from 'path'
import vue from '@vitejs/plugin-vue'
 
export default defineConfig({
  resolve: {
      alias: {
          '@': `${path.resolve(__dirname, 'src')}`,
      }
  },

  plugins: [
    vue(),
  ],
  
  build: {
    // emit manifest so PHP can find the hashed files
    manifest: true,
    
    // target: 'es2018',
    // lib: {
    //   entry: 'src/main.js',
    //   formats: ['esm'],
    //   name: 'App',
    // },
    rollupOptions: {
      input: '/src/main.js',
      output: {
        entryFileNames: `assets/[name].js`,
        chunkFileNames: `assets/[name].js`,
        assetFileNames: `assets/[name].[ext]`
      }
    },
    
    minify: true,
    write: true
  },

  // server: {
  //   strictPort: true,
  //   port: 3000
  // },
})
