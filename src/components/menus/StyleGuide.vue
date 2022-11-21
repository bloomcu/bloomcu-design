<template>
  <div class="styleguide flex bg-black bg-opacity-30%">
    <div class="styleguide__content padding-x-xl padding-top-xl radius-md shadow-md">
      
      <!-- Content -->
      <div style="padding-right: 500px;">
        <!-- Logo -->
        <!-- <div class="margin-bottom-xl">
          <p class="text-sm text-uppercase text-bold border-bottom padding-bottom-xs margin-bottom-md width-100%">Logo</p>
          <h2>AcmeCU</h2>
        </div> -->
        
        <!-- Color palette -->
        <div class="margin-bottom-xl">
          <div class="border-bottom padding-bottom-sm margin-bottom-md width-100% bloomcu-design">
            <h2>Color palette</h2>
          </div>
          <div class="grid gap-sm">
            <!-- Primary color -->
            <div class="col-6 padding-y-xs bloomcu-design">
              <p>Primary color</p>
            </div>
            <div class="col-6 padding-y-xs radius-md" :style="`background: ${store.variables.color_primary};`">
              <p class="text-center helpers__button-primary-text-color bloomcu-design">
                {{ store.variables.color_primary }}
              </p>
            </div>
            
            <!-- Accent color -->
            <div class="col-6 padding-y-xs bloomcu-design">
              <p>Accent color</p>
            </div>
            <div class="col-6 padding-y-xs radius-md" :style="`background: ${store.variables.color_accent};`">
              <p class="text-center helpers__button-secondary-text-color bloomcu-design">
                {{ store.variables.color_accent }}
              </p>
            </div>
            
            <!-- Text color -->
            <div class="col-6 padding-y-xs bloomcu-design">
              <p>Text color</p>
            </div>
            <div class="col-6 padding-y-xs radius-md" :style="`background: ${store.variables.color_contrast_higher};`">
              <p class="text-center helpers__button-primary-text-color bloomcu-design">
                {{ store.variables.color_contrast_higher }}
              </p>
            </div>
            
            <!-- Default background color -->
            <div class="col-6 padding-y-xs bloomcu-design">
              <p>Default background color</p>
            </div>
            <div class="col-6 padding-y-xs radius-md border" :style="`background: ${store.variables.color_background};`">
              <p class="text-center bloomcu-design">
                {{ store.variables.color_background }}
              </p>
            </div>
          </div>
        </div>
        
        <!-- Block themes -->
        <div class="margin-bottom-xl">
          <div class="border-bottom padding-bottom-sm margin-bottom-md width-100% bloomcu-design">
            <h2 class="margin-bottom-xxs">Block themes</h2>
            <p class="text-sm">The following block themes are automatically derived from the color palette.</p>
          </div>
          <div class="grid gap-sm">
            <!-- Default theme -->
            <div class="col-6 padding-y-xs bloomcu-design">
              <p>Default theme</p>
            </div>
            <div class="col-6 padding-sm radius-md border" :style="`background: ${store.variables.color_background};`">
              <div class="bloomcu-design">
                <p class="margin-bottom-xs">Background color: {{ store.variables.color_primary }}</p>
                <p>Text color: {{ store.variables.color_contrast_higher }}</p>
              </div>
            </div>
            
            <!-- Medium theme -->
            <div class="col-6 padding-y-xs bloomcu-design">
              <p>Medium theme</p>
            </div>
            <div class="col-6 padding-sm radius-md border" :style="`background: ${store.variables.color_primary + '0D'};`">
              <div class="bloomcu-design">
                <p class="margin-bottom-xs">Background color: {{ store.variables.color_primary + '0D' }}</p>
                <p>Text color: {{ store.variables.color_contrast_higher }}</p>
              </div>
            </div>
            
            <!-- Dark theme -->
            <div class="col-6 padding-y-xs bloomcu-design">
              <p>Dark theme</p>
            </div>
            <div class="col-6 padding-sm radius-md" :style="`background: ${store.variables.color_primary};`">
              <div class="bloomcu-design">
                <p class="margin-bottom-xs color-white">Background color: {{ store.variables.color_primary}}</p>
                <p class="color-white">Text color: {{ store.variables.color_white }}</p>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Text -->
        <div class="margin-bottom-xl">
          <div class="border-bottom padding-bottom-sm margin-bottom-md width-100% bloomcu-design">
            <h2>Text</h2>
          </div>
          <div class="grid gap-sm">
            <!-- Heading text -->
            <div class="col-6 padding-y-xs bloomcu-design">
              <p>Heading text</p>
            </div>
            <div class="col-6 padding-sm radius-md border">
              <h4 class="margin-bottom-xs">Font: {{ store.variables.font_primary.name }}</h4>
              <div class="bloomcu-design">
                <p>Weight: {{ store.variables.font_primary.weight }}</p>
              </div>
            </div>
            
            <!-- Body text -->
            <div class="col-6 padding-y-xs bloomcu-design">
              <p>Body text</p>
            </div>
            <div class="col-6 padding-sm radius-md border">
              <p class="margin-bottom-xs">Font: {{ store.variables.font_secondary.name }}</p>
              <div class="bloomcu-design">
                <p>Weight: {{ store.variables.font_secondary.weight }}</p>
              </div>
            </div>
            
            <!-- Buttons text -->
            <div class="col-6 padding-y-xs bloomcu-design">
              <p>Buttons text</p>
            </div>
            <div class="col-6 padding-sm radius-md border">
              <p class="margin-bottom-xs">Font: {{ store.variables.font_buttons.name ? store.variables.font_buttons.name : store.variables.font_secondary.name }}</p>
              <div class="bloomcu-design">
                <p>Weight: {{ store.variables.font_buttons.weight ? store.variables.font_buttons.weight : store.variables.font_secondary.weight }}</p>
              </div>
            </div>
            
            <!-- Text base size -->
            <div class="col-6 padding-y-xs bloomcu-design">
              <p>Text base size</p>
            </div>
            <div class="col-6 padding-sm radius-md border">
              <div class="bloomcu-design">
                <p>{{ store.variables.text_base_size + 'rem' }}</p>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Buttons: Colors -->
        <div class="margin-bottom-xl">
          <div class="border-bottom padding-bottom-sm margin-bottom-md width-100% bloomcu-design">
            <h2 class="margin-bottom-xs">Buttons</h2>
            <h4 class="margin-bottom-xxs">Colors</h4>
            <p class="text-sm">Button colors are inherited from the color palette.</p>
          </div>
          <div class="grid gap-sm">
            <!-- Primary button -->
            <div class="col-6 padding-y-xs bloomcu-design">
              <p>Primary button</p>
            </div>
            <div class="col-6 padding-sm radius-md border" :style="`background: ${store.variables.color_primary};`">
              <div class="bloomcu-design">
                <p class="helpers__button-primary-text-color margin-bottom-xs">Background color: {{ store.variables.color_primary }}</p>
                <p class="helpers__button-primary-text-color">Text color: {{ store.variables.btn_primary_text_color ? store.variables.btn_primary_text_color : store.variables.color_white }}</p>
              </div>
            </div>
            
            <!-- Secondary button -->
            <div class="col-6 padding-y-xs bloomcu-design">
              <p>Secondary button</p>
            </div>
            <div class="col-6 padding-sm radius-md border" :style="`background: ${store.variables.color_accent};`">
              <div class="bloomcu-design">
                <p class="helpers__button-secondary-text-color margin-bottom-xs">Background color: {{ store.variables.color_accent }}</p>
                <p class="helpers__button-secondary-text-color">Text color: {{ store.variables.btn_secondary_text_color ? store.variables.btn_secondary_text_color : store.variables.color_white }}</p>
              </div>
            </div>
            
            <!-- Tertiary button -->
            <div class="col-6 padding-y-xs bloomcu-design">
              <p>Tertiary button</p>
            </div>
            <div class="col-6 padding-sm radius-md border" :style="`background: ${store.variables.color_white};`">
              <div class="bloomcu-design">
                <p class="helpers__button-tertiary-text-color margin-bottom-xs">Background color: {{ store.variables.color_white }}</p>
                <p class="helpers__button-tertiary-text-color">Text color: {{ store.variables.btn_secondary_text_color ? store.variables.btn_secondary_text_color : store.variables.color_white }}</p>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Buttons: Other button styles -->
        <div class="margin-bottom-xl">
          <div class="border-bottom padding-bottom-sm margin-bottom-md width-100% bloomcu-design">
            <h4>Other button styles</h4>
          </div>
          <div class="grid gap-sm">            
            <!-- Corner radius -->
            <div class="col-6 padding-y-xs bloomcu-design">
              <p>Corner radius</p>
            </div>
            <div class="col-6 padding-sm radius-md border">
              <div class="bloomcu-design">
                <p>{{ store.variables.btn_radius + 'em' }}</p>
              </div>
            </div>
            
            <!-- Padding -->
            <div class="col-6 padding-y-xs bloomcu-design">
              <p>Padding</p>
            </div>
            <div class="col-6 padding-sm radius-md border">
              <div class="bloomcu-design">
                <p class="margin-bottom-xs">Vertical: {{ store.variables.btn_padding_y + 'em' }}</p>
                <p>Horizontal: {{ store.variables.btn_padding_x + 'em' }}</p>
              </div>
            </div>
            
            <!-- Text transform -->
            <div class="col-6 padding-y-xs bloomcu-design">
              <p>Text transform</p>
            </div>
            <div class="col-6 padding-sm radius-md border">
              <div class="bloomcu-design">
                <p class="text-capitalize">{{ store.variables.btn_text_transform }}</p>
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

<style lang="scss">
/* --------------------------------
Styleguide
-------------------------------- */
.styleguide {
  position: fixed;
  top: 0;
  right: 30px;
  width: 100%;
  height: 100vh;
  z-index: 90;
  
  &__content {
    width: 100%;
    height: 100%;
    overflow: auto;
    background: var(--color-bg);
  }
}

/* --------------------------------
Styleguide helpers
-------------------------------- */
.helpers {
  &__color-contrast-higher {
    color: var(--color-contrast-higher) !important;
  }
  
  &__button-primary-text-color {
    color: var(--btn-primary-text-color) !important;
  }
  
  &__button-secondary-text-color {
    color: var(--btn-secondary-text-color) !important;
  }
  
  &__button-tertiary-text-color {
    color: var(--btn-tertiary-text-color) !important;
  }
}
</style>
