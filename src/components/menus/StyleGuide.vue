<template>
  <div class="styleguide flex flex-center bg-black bg-opacity-30%">
    <div class="styleguide__content width-100% max-width-xl height-100% overflow-hidden padding-x-lg padding-top-lg radius-md shadow-md">
      
      <!-- Content -->
      <div class="container max-width-lg">
        <div class="grid gap-xxl">
          <div class="col-6 margin-bottom-0">

            <!-- Logo -->
            <!-- <div class="margin-bottom-xl">
              <p class="text-sm text-uppercase text-bold border-bottom padding-bottom-xs margin-bottom-md width-100%">Logo</p>
              <h2>AcmeCU</h2>
            </div> -->
            
            <!-- Typography -->
            <div>
              <p class="text-sm text-uppercase text-bold border-bottom padding-bottom-xs margin-bottom-md width-100%">Typography</p>
              <h1 class="h1 margin-bottom-xs">H1 heading sample</h1>
              <h2 class="h2 margin-bottom-xs">H2 heading sample</h2>
              <h3 class="h3 margin-bottom-xs">H3 heading sample</h3>
              <h4 class="h4 margin-bottom-xs">H4 heading sample</h4>
              <p>Body lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam malesuada leo ac augue fringilla dignissim. Vivamus dolor arcu, iaculis eget augue eget, euismod vulputate lorem.</p>
            </div>
          </div>
          
          <div class="col-6 margin-bottom-0">
            
            <!-- Colors -->
            <div class="margin-bottom-xl">
              <p class="text-sm text-uppercase text-bold border-bottom padding-bottom-xs margin-bottom-md width-100%">Colors</p>
              <div class="grid gap-md">
                <div class="col-4 flex flex-column flex-center">
                  <div class="width-xxl height-xxl margin-bottom-xs radius-full border" :style="`background: ${store.variables.color_primary};`"></div>
                  <p class="text-sm text-center">Primary</p>
                </div>
                <div class="col-4 flex flex-column flex-center">
                  <div class="width-xxl height-xxl margin-bottom-xs radius-full border" :style="`background: ${store.variables.color_accent};`"></div>
                  <p class="text-sm text-center">Accent</p>
                </div>
                <div class="col-4 flex flex-column flex-center">
                  <div class="width-xxl height-xxl margin-bottom-xs radius-full border" :style="`background: ${store.variables.color_contrast_higher};`"></div>
                  <p class="text-sm text-center">Text color</p>
                </div>
                <div class="col-4 flex flex-column flex-center">
                  <div class="width-xxl height-xxl margin-bottom-xs radius-full border" :style="`background: ${store.variables.color_background};`"></div>
                  <p class="text-sm text-center">Background <br>color</p>
                </div>
                <div class="col-4 flex flex-column flex-center">
                  <div class="width-xxl height-xxl margin-bottom-xs radius-full bg-contrast-medium border" :style="`background: ${store.variables.color_primary + '0D'};`"></div>
                  <p class="text-sm text-center">Background <br>medium</p>
                </div>
                <div class="col-4 flex flex-column flex-center">
                  <div class="width-xxl height-xxl margin-bottom-xs radius-full border" :style="`background: ${store.variables.color_primary};`"></div>
                  <p class="text-sm text-center">Background <br>dark</p>
                </div>
              </div>
            </div>
            
            <!-- Buttons -->
            <div>
              <p class="text-sm text-uppercase text-bold border-bottom padding-bottom-xs margin-bottom-md width-100%">Buttons</p>
              <div class="grid gap-sm">
                <div class="col">
                  <div class="margin-bottom-sm">
                    <a href="#" class="btn btn--primary">Primary</a>
                  </div>
                  <div class="margin-bottom-sm">
                    <a href="#" class="btn btn--secondary">Secondary</a>
                  </div>
                  <div>
                    <a href="#" class="btn btn--tertiary">Tertiary</a>
                  </div>
                </div>
                
                <div class="col">
                  <a href="#">Hyperlink</a>
                </div>
              </div>
            </div>
          </div>  
        </div>
        
      </div>
    </div>
  </div>
</template>

<script setup>
import { useDesignStore } from '@/store/useDesignStore'

const store = useDesignStore()
</script>
