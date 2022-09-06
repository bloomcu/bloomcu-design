<template>
  <div>
    <div class="bloomcu-design">
      <!-- Design variables -->
      <div v-if="store.design">
        <DesignFonts :variables="store.variables"/>
        <DesignStyles :variables="store.variables"/>
      </div>
      
      <!-- Siderail -->
      <div v-if="mode === 'edit'" class="siderail">
        <!-- Top menu -->
        <div class="siderail__top-menu">
          <IconLoading v-if="store.loading"/>
          <svg v-else width="24" height="24" viewBox="0 0 24 24">
            <g fill="currentColor">
              <path d="M22.707,6.293l-5-5c-0.391-0.391-1.023-0.391-1.414,0l-2.291,2.291l2.706,2.71l-1.415,1.413l-2.705-2.709 l-1.586,1.586l1.709,1.709l-1.414,1.414L9.588,7.998L8.002,9.584l2.709,2.709l-1.414,1.414l-2.709-2.709l-1.586,1.586l1.709,1.709 l-1.414,1.414l-1.709-1.709l-2.295,2.295c-0.391,0.391-0.391,1.023,0,1.414l5,5C6.488,22.902,6.744,23,7,23s0.512-0.098,0.707-0.293 l15-15C23.098,7.316,23.098,6.684,22.707,6.293z"></path> <path data-color="color-2" d="M4.672,10.086l5.414-5.414L6.707,1.293c-0.391-0.391-1.023-0.391-1.414,0l-4,4 c-0.391,0.391-0.391,1.023,0,1.414L4.672,10.086z"></path><path data-color="color-2" d="M21.98,16.804c-0.039-0.193-0.134-0.371-0.273-0.511l-2.379-2.379l-5.414,5.414l2.379,2.379 c0.14,0.14,0.317,0.235,0.511,0.273l5,1C21.869,22.994,21.935,23,22,23c0.263,0,0.518-0.104,0.707-0.293 c0.236-0.236,0.339-0.575,0.273-0.903L21.98,16.804z"></path>
            </g>
          </svg>
          <!-- <button v-else @click="toggleHero()" class="siderail-item__button" :class="activeMenu === 'hero' ? 'siderail-item__button--active' : ''">
            <svg width="24" height="24" viewBox="0 0 24 24"><g stroke-linecap="round" fill="none" stroke="currentColor" stroke-linejoin="round"><line x1="1" y1="12" x2="23" y2="12"></line><line x1="1" y1="5" x2="23" y2="5"></line><line x1="1" y1="19" x2="23" y2="19"></line></g></svg>
          </button> -->
          <!-- <div v-if="activeMenu === 'hero'" class="siderail-menu">
            <div class="siderail-menu__section">
              <AppLogin/>
              <div v-if="store.designs" class="text-component">
                <p class="font-bold">My Designs</p>
                <div
                  v-for="design in store.designs" 
                  :key="design.id" 
                  class="card padding-xs text-sm"
                >
                  {{ design.title }}
                </div>
              </div>
            </div>
          </div> -->
        </div>
        
        <!-- Design controls -->
        <div v-if="store.design">    
          <!-- Colors -->
          <div class="siderail-item">
            <button @click="toggleMenu('colors')" type="button" class="siderail-item__button" :class="activeMenu === 'colors' ? 'siderail-item__button--active' : ''">
              <svg width="24" height="24" viewBox="0 0 24 24">
                <g stroke-linecap="round" stroke-width="1.5" fill="none" stroke="currentColor" stroke-linejoin="round">
                  <path data-cap="butt" d="M3.41,12.017l10.607,7.778 c0.781,0.781,3.155-0.327,5.303-2.475s3.256-4.522,2.475-5.303L14.017,1.41"></path><ellipse transform="matrix(0.7071 -0.7071 0.7071 0.7071 -2.195 8.1276)" cx="8.713" cy="6.713" rx="7.5" ry="3"></ellipse><path d="M1,20 c0-1.105,2-4,2-4s2,2.895,2,4s-0.895,2-2,2S1,21.105,1,20z"></path><path d="M14,11h4 c2.209,0,4-1.791,4-4c0-2.209-1.791-4-4-4h-2.817"></path>
                </g>
              </svg>
            </button>
            <div v-if="activeMenu === 'colors'" class="siderail-menu"  style="top: -205px;">
              <div class="siderail-menu__section" style="width: auto;">
                <p style="font-size: 18px;" class="font-bold">Color palette</p>
              </div>
              <div class="siderail-menu__section">
                <p style="width: 200px; font-size: 18px;">Primary</p>
                <div class="input-group">
                  <input v-model="store.variables.color_primary" class="form-control" style="width: 160px;" type="text">
                  <div class="input-group__tag">
                    <!-- <div :style="{'background-color': colorPrimary}" style="width: 20px; height: 20px; border-radius: 100px; cursor: pointer;"></div> -->
                    <color-picker 
                      v-model:pureColor="store.variables.color_primary"
                      shape="circle"
                      format="hex"
                      pickerType="chrome"
                      useType="pure"
                      lang="en"
                      roundHistory
                    />
                  </div>
                </div>
              </div>
              
              <div class="siderail-menu__section">
                <p style="width: 200px; font-size: 18px;">Accent</p>
                <div class="input-group">
                  <input v-model="store.variables.color_accent" class="form-control" style="width: 160px;" type="text">
                  <div class="input-group__tag">
                    <color-picker 
                      v-model:pureColor="store.variables.color_accent"
                      shape="circle"
                      format="hex"
                      pickerType="chrome"
                      useType="pure"
                      lang="en"
                      roundHistory
                    />
                  </div>
                </div>
              </div>
              
              <div class="siderail-menu__section">
                <p style="width: 200px; font-size: 18px;">Text</p>
                <div class="input-group">
                  <input v-model="store.variables.color_contrast_higher" class="form-control" style="width: 160px;" type="text">
                  <div class="input-group__tag">
                    <color-picker 
                      v-model:pureColor="store.variables.color_contrast_higher"
                      shape="circle"
                      format="hex"
                      pickerType="chrome"
                      useType="pure"
                      lang="en"
                      roundHistory
                    />
                  </div>
                </div>
              </div>
              
              <div class="siderail-menu__section">
                <p style="width: 200px; font-size: 18px;">Background</p>
                <div class="input-group">
                  <input v-model="store.variables.color_background" class="form-control" style="width: 160px;" type="text">
                  <div class="input-group__tag">
                    <color-picker 
                      v-model:pureColor="store.variables.color_background"
                      shape="circle"
                      format="hex"
                      pickerType="chrome"
                      useType="pure"
                      lang="en"
                      roundHistory
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Fonts -->
          <div class="siderail-item">
            <button @click="toggleMenu('typography')" type="button" class="siderail-item__button" :class="activeMenu === 'typography' ? 'siderail-item__button--active' : ''">
              <svg width="24" height="24" viewBox="0 0 24 24">
                <g stroke-linecap="round" stroke-width="1.5" fill="none" stroke="currentColor" stroke-linejoin="round">
                  <polyline points="1,5 1,3 17,3 17,5 "></polyline><line x1="9" y1="3" x2="9" y2="20"></line><line x1="5" y1="20" x2="12" y2="20"></line><polyline points=" 13,11 13,10 23,10 23,11 "></polyline><line x1="18" y1="10" x2="18" y2="20"></line><line x1="16" y1="20" x2="20" y2="20"></line>
                </g>
              </svg>
            </button>
            <div v-if="activeMenu === 'typography'" class="siderail-menu" style="top: -250px;">
              <div class="siderail-menu__section justify-between" style="width: auto;">
                <p style="font-size: 18px;" class="font-bold">Fonts</p>
                <!-- Toggle Google Fonts and upload -->
                <div class="flex align-center">
                  <button 
                    @click="activeFontsSource = 'google-font'"
                    class="reset text-sm border radius-full padding-y-xxs padding-x-sm cursor-pointer margin-right-xs"
                    :class="activeFontsSource === 'google-font' ? 'border-opacity-0 color-white bg-black' : ''"
                  >
                    Google Fonts
                  </button>
                  <button 
                    @click="activeFontsSource = 'upload'"
                    class="reset text-sm border radius-full padding-y-xxs padding-x-sm cursor-pointer"
                    :class="activeFontsSource === 'upload' ? 'border-opacity-0 color-white bg-black' : ''"
                  >
                    Upload
                  </button>
                </div>
              </div>
              
              <!-- Google Fonts -->
              <!-- Primary font -->
              <div class="siderail-menu__section">
                <div style="width: 140px;">
                  <p style="font-size: 18px;">Heading font</p>  
                </div>
                <!-- Google font -->
                <div v-if="activeFontsSource === 'google-font'" style="width: 400px;">
                  <div class="select margin-bottom-xxs">
                    <select @change="onSelectPrimaryFont($event)" name="heading" id="heading" class="select_input form-control width-100%">
                      <!-- <option value="">Select a Google Font</option> -->
                      <option value="" selected disabled hidden>Select a Google Font</option>
                      <option 
                        v-for="font in googleFonts" 
                        :key="font.name" 
                        :value="font.name" 
                        :selected="store.variables.font_primary.name === font.name"
                      >
                        {{ font.name }}
                      </option>
                    </select>
                    <svg class="select__icon" aria-hidden="true" viewBox="0 0 16 16"><polyline points="1 5 8 12 15 5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
                  </div>
                  <div v-if="store.variables.font_primary.source === 'google-font'" class="select">
                    <select v-model="store.variables.font_primary_weight" name="heading" id="heading" class="select_input form-control width-100%">
                      <option 
                        v-for="weight in getGoogleFontByName(store.variables.font_primary.name).variants" 
                        :key="weight" 
                        :value="weight" 
                        :selected="store.variables.font_primary_weight === weight"
                      >
                        {{ weight }}
                      </option>
                    </select>
                    <svg class="select__icon" aria-hidden="true" viewBox="0 0 16 16"><polyline points="1 5 8 12 15 5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
                  </div>
                </div>
                
                <!-- Uploaded font -->
                <div v-if="activeFontsSource === 'upload'" style="width: 400px;">
                  <AppUploadPrimaryFont/>
                </div>
              </div>
              
              <!-- Secondary font -->
              <div class="siderail-menu__section">
                <div style="width: 140px;">
                  <p style="font-size: 18px;">Body font</p>  
                </div>
                <!-- Google font -->
                <div v-if="activeFontsSource === 'google-font'" style="width: 400px;">
                  <div class="select margin-bottom-xxs">
                    <select @change="onSelectSecondaryFont($event)"  name="body" id="body" class="select_input form-control width-100%">
                      <!-- <option value="">Select a Google Font</option> -->
                      <option value="" selected disabled hidden>Select a Google Font</option>
                      <option 
                        v-for="font in googleFonts" 
                        :key="font.name" 
                        :value="font.name" 
                        :selected="store.variables.font_secondary.name === font.name"
                      >
                        {{ font.name }}
                      </option>
                    </select>
                    <svg class="select__icon" aria-hidden="true" viewBox="0 0 16 16"><polyline points="1 5 8 12 15 5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
                  </div>
                  <div v-if="store.variables.font_secondary.source === 'google-font'" class="select">
                    <select v-model="store.variables.font_secondary_weight" name="heading" id="heading" class="select_input form-control width-100%">
                      <option 
                        v-for="weight in getGoogleFontByName(store.variables.font_secondary.name).variants" 
                        :key="weight" 
                        :value="weight" 
                        :selected="store.variables.font_secondary_weight === weight"
                      >
                        {{ weight }}
                      </option>
                    </select>
                    <svg class="select__icon" aria-hidden="true" viewBox="0 0 16 16"><polyline points="1 5 8 12 15 5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
                  </div>
                </div>
                
                <!-- Uploaded font -->
                <div v-if="activeFontsSource === 'upload'" style="width: 400px;">
                  <AppUploadSecondaryFont/>
                </div>
              </div>
              
              <!-- Text base size -->
              <div class="siderail-menu__section">
                  <p style="width: 140px; font-size: 18px;">Text base size</p>
                  
                  <fieldset>
                    <div class="slider slider--input gap-sm">
                      <div class="slider__range">
                        <input v-model="store.variables.text_base_size" class="slider__input" type="range" name="sliderValue" min="1" max="1.8" step="0.01">
                      </div>
                      <div class="slider__value">
                        <input v-model="store.variables.text_base_size" class="form-control text-sm text-center width-xl" type="text">
                        <!-- <span class="text-sm margin-left-xxxs">rem</span> -->
                      </div>
                    </div>
                    <small>Add guidelines here. Default is 1.3. Most sites use between 1 - 1.5.</small>
                  </fieldset>
              </div>
            </div>
          </div>
          <!-- Buttons -->
          <div class="siderail-item">
            <button @click="toggleMenu('buttons')" type="button" class="siderail-item__button" :class="activeMenu === 'buttons' ? 'siderail-item__button--active' : ''">
              <svg width="24" height="24" viewBox="0 0 24 24">
                <g stroke-linecap="round" stroke-width="1.5" fill="none" stroke="currentColor" stroke-linejoin="round"><polyline data-cap="butt" points="8.333,14 1,14 1,1 23,1 23,14 20,14 "></polyline><line data-cap="butt" x1="13" y1="14" x2="19" y2="20"></line><polygon points=" 6,7 10,19 13,14 18,11 "></polygon>
                </g>
              </svg>
            </button>
            <div v-if="activeMenu === 'buttons'" class="siderail-menu" style="top: -345px;">
              <div class="siderail-menu__section" style="width: auto;">
                <p style="font-size: 18px;" class="font-bold">Button styles</p>
              </div>
                 
              <!-- Primary button text color -->
              <div class="siderail-menu__section" style="width: 100%;">
                <div style="width: 100%;">
                  <p class="margin-bottom-sm" style="font-size: 18px;">Primary button text color</p>
                  <div class="flex gap-sm items-center">
                    <div class="select" style="width: 300px;">
                      <select v-model="store.variables.btn_primary_text_color" name="heading" id="heading" class="select_input form-control" style="width: 300px;">
                        <option 
                          v-for="color in [
                            { name: 'Primary', hex: store.variables.color_primary },
                            { name: 'Accent', hex: store.variables.color_accent },
                            { name: 'Text', hex: store.variables.color_contrast_higher },
                            { name: 'Background (Default)', hex: store.variables.color_white },
                          ]" 
                          :key="color.name" 
                          :value="color.hex" 
                          :selected="store.variables.btn_primary_text_color === color.hex"
                        >
                          {{ color.name }}
                        </option>
                      </select>
                      <svg class="select__icon" aria-hidden="true" viewBox="0 0 16 16"><polyline points="1 5 8 12 15 5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
                    </div>
                    <a href="#" class="btn btn--primary" style="width: 200px;">Primary</a>
                  </div>
                </div>
              </div>
              
              <!-- Secondary button text color -->
              <div class="siderail-menu__section" style="width: 100%;">
                <div style="width: 100%;">
                  <p class="margin-bottom-sm" style="font-size: 18px;">Secondary button text color</p>
                  <div class="flex gap-sm items-center">
                    <div class="select" style="width: 300px;">
                      <select v-model="store.variables.btn_secondary_text_color" name="heading" id="heading" class="select_input form-control" style="width: 300px;">
                        <option 
                          v-for="color in [
                            { name: 'Primary', hex: store.variables.color_primary },
                            { name: 'Accent', hex: store.variables.color_accent },
                            { name: 'Text', hex: store.variables.color_contrast_higher },
                            { name: 'Background (Default)', hex: store.variables.color_white },
                          ]" 
                          :key="color.name" 
                          :value="color.hex" 
                          :selected="store.variables.btn_secondary_text_color === color.hex"
                        >
                          {{ color.name }}
                        </option>
                      </select>
                      <svg class="select__icon" aria-hidden="true" viewBox="0 0 16 16"><polyline points="1 5 8 12 15 5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
                    </div>
                    <a href="#" class="btn btn--secondary" style="width: 200px;">Secondary</a>
                  </div>
                </div>
              </div>
              
              <!-- Tertiary button text color -->
              <div class="siderail-menu__section" style="width: 100%;">
                <div style="width: 100%;">
                  <p class="margin-bottom-sm" style="font-size: 18px;">Tertiary button text color</p>
                  <div class="flex gap-sm items-center">
                    <div class="select" style="width: 300px;">
                      <select v-model="store.variables.btn_tertiary_text_color" name="heading" id="heading" class="select_input form-control" style="width: 300px;">
                        <option 
                          v-for="color in [
                            { name: 'Primary', hex: store.variables.color_primary },
                            { name: 'Accent', hex: store.variables.color_accent },
                            { name: 'Text (Default)', hex: store.variables.color_contrast_higher },
                            { name: 'Background', hex: store.variables.color_white },
                          ]" 
                          :key="color.name" 
                          :value="color.hex" 
                          :selected="store.variables.btn_tertiary_text_color === color.hex"
                        >
                          {{ color.name }}
                        </option>
                      </select>
                      <svg class="select__icon" aria-hidden="true" viewBox="0 0 16 16"><polyline points="1 5 8 12 15 5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
                    </div>
                    <a href="#" class="btn btn--tertiary" style="width: 200px;">Tertiary</a>
                  </div>
                </div>
              </div>

              <!-- Buttons radius -->
              <div class="siderail-menu__section" style="width: 100%;">
                <p style="width: 260px; margin-right: 20px; font-size: 18px;" >Radius</p>
                <fieldset style="width: 100%;">
                  <div class="slider slider--input gap-sm">
                    <div class="slider__range">
                      <input v-model="store.variables.btn_radius" class="slider__input" type="range" name="sliderValue" min="0" max="2" step="0.05">
                    </div>
                    <div class="slider__value">
                      <input v-model="store.variables.btn_radius" class="form-control text-sm text-center width-xl" type="text">
                    </div>
                  </div>
                </fieldset>
              </div>
              
              <!-- Buttons text weight -->
              <div class="siderail-menu__section" style="width: 100%;">
                <p style="width: 260px; margin-right: 20px; font-size: 18px;">Text weight</p>
                <div v-if="store.variables.font_secondary.source === 'google-font'" class="select">
                  <select v-model="store.variables.btn_text_weight" name="heading" id="heading" class="select_input form-control width-100%">
                    <option 
                      v-for="weight in getGoogleFontByName(store.variables.font_secondary.name).variants"
                      :key="weight" 
                      :value="weight" 
                      :selected="store.variables.btn_text_weight === weight"
                    >
                      {{ weight }}
                    </option>
                  </select>
                  <svg class="select__icon" aria-hidden="true" viewBox="0 0 16 16"><polyline points="1 5 8 12 15 5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
                </div>
              </div>
              
              <!-- Buttons text transform -->
              <div class="siderail-menu__section" style="width: 100%;">
                <p style="width: 260px; margin-right: 20px; font-size: 18px;">Text transform</p>
                <div class="select">
                  <select v-model="store.variables.btn_text_transform" name="heading" id="heading" class="select_input form-control width-100%">
                    <option 
                      v-for="transform in ['none', 'uppercase']" 
                      :key="transform" 
                      :value="transform" 
                      :selected="store.variables.btn_text_transform === transform"
                    >
                      {{ transform }}
                    </option>
                  </select>
                  <svg class="select__icon" aria-hidden="true" viewBox="0 0 16 16"><polyline points="1 5 8 12 15 5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
                </div>
              </div>
            </div>
          </div>
          <!-- Mini style guide -->
          <div class="siderail-item">
            <button @click="toggleMenu('styleguide')" type="button" class="siderail-item__button" :class="activeMenu === 'styleguide' ? 'siderail-item__button--active' : ''">
              <svg width="24" height="24" viewBox="0 0 24 24">
                <g stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor" stroke-linejoin="round">
                  <line x1="12" y1="1" x2="12" y2="3"></line><line data-cap="butt" x1="8" y1="17" x2="6" y2="23"></line><line data-cap="butt" x1="18" y1="23" x2="16" y2="17"></line><line data-cap="butt" x1="7" y1="20" x2="17" y2="20"></line><rect x="4" y="3" width="16" height="14"></rect>
                </g>
              </svg>
            </button>
          </div>
        </div>
        
        <!-- Bottom menu -->
        <div class="siderail__bottom-menu">
          <button @click="togglePower()" class="siderail-item__button">
            <svg width="24" height="24" viewBox="0 0 24 24"><g stroke-linecap="round" stroke-width="1.5" fill="none" stroke="currentColor" stroke-linejoin="round"><path d="M17,4.3c3,1.7,5,5,5,8.7 c0,5.5-4.5,10-10,10S2,18.5,2,13c0-3.7,2-6.9,5-8.7"></path><line x1="12" y1="1" x2="12" y2="8"></line></g></svg>
          </button>
        </div>
      </div>
    </div>
    
    <!-- Styleguide -->
    <div v-if="activeMenu === 'styleguide'" class="styleguide flex flex-center bg-black bg-opacity-30%">
      <div class="styleguide__content width-100% max-width-xl height-100% overflow-hidden padding-x-md padding-top-lg bg radius-md shadow-md">
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
                    <div class="width-xxl height-xxl margin-bottom-xs radius-full" :style="`background: ${store.variables.color_primary};`"></div>
                    <p class="text-sm text-center">Primary</p>
                  </div>
                  <div class="col-4 flex flex-column flex-center">
                    <div class="width-xxl height-xxl margin-bottom-xs radius-full" :style="`background: ${store.variables.color_accent};`"></div>
                    <p class="text-sm text-center">Accent</p>
                  </div>
                  <div class="col-4 flex flex-column flex-center">
                    <div class="width-xxl height-xxl margin-bottom-xs radius-full" :style="`background: ${store.variables.color_contrast_higher};`"></div>
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
                    <div class="width-xxl height-xxl margin-bottom-xs radius-full" :style="`background: ${store.variables.color_primary};`"></div>
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
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { debounce } from './composables/useDebounce'
import { useDesignStore } from './store/useDesignStore'
import { googleFonts, getGoogleFontByName } from './store/useGoogleFonts'
import { ColorPicker } from 'vue3-colorpicker'

import IconLoading from './components/IconLoading.vue'
// import AppLogin from './components/AppLogin.vue'
import AppUploadPrimaryFont from './components/AppUploadPrimaryFont.vue'
import AppUploadSecondaryFont from './components/AppUploadSecondaryFont.vue'
import DesignFonts from './components/DesignFonts.vue'
import DesignStyles from './components/DesignStyles.vue'

const props = defineProps({
  design: { 
    type: String,
    required: true,
  },
  mode: {
    type: String,
    required: true,
  }
})

const activeMenu = ref('')
const activeFontsSource = ref('google-font')
const store = useDesignStore()

const toggleHero = () => {
  toggleMenu('hero')
  
  if (!store.designs) {
    store.index()
  }
}

function onSelectPrimaryFont(e) {
  let font = getGoogleFontByName(e.target.value)
  
  store.variables.font_primary = {
    source: 'google-font',
    name: font.name,
    url: '',
  }
  
  store.variables.font_primary_weight = '300'
}

function onSelectSecondaryFont(e) {
  let font = getGoogleFontByName(e.target.value)
  
  store.variables.font_secondary = {
    source: 'google-font',
    name: font.name,
    url: '',
  }
  
  store.variables.font_secondary_weight = '300'
}

const toggleMenu = (menu) => {
  activeMenu.value = activeMenu.value === menu ? '' : menu
}

const togglePower = () => {
  document.cookie = 'design_plugin_disabled=true; path=/;'
}

const saveDesign = debounce(() => {
  store.update()
}, 3000)

store.$subscribe((mutation, state) => {
  if (!['loading', 'design', 'designs'].includes(mutation.events.key)) {
    saveDesign()
  }
})

onMounted(() => {
  // store.init()
  store.show(props.design)
    .then(() => {
      if (store.variables.font_primary.source === 'upload') {
        activeFontsSource.value = 'upload'
      }
    })
})
</script>

<style lang="scss">
@import "vue3-colorpicker/style.css";

/* --------------------------------
Body
-------------------------------- */
body.design-plugin-enabled {
  padding-right: 65px;
}

/* --------------------------------
Vue Colorpicker
-------------------------------- */
.vc-color-wrap {
  margin: 0 !important;
}

/* --------------------------------
Plugin styles
-------------------------------- */
.bloomcu-design {
  /* --------------------------------
  Resets
  -------------------------------- */
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
  font-size: 20px;
  font-weight: normal;
  color: #313135;
  
  button, input, span {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";    
    font-weight: normal;
  }
  
  h1, .h1, h2, .h2, h3, .h3, h4, .h4 {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";  
    font-weight: normal;
    color: #1c1c21;
    line-height: 1.2;
  }

  h1, .h1 {
    font-size: 41px;
  }

  h2, .h2 {
    font-size: 34px;
  }

  h3, .h3 {
    font-size: 28px;
  }

  h4, .h4 {
    font-size: 24px;
  }
  
  .form-control {
    background: #fff;
  }
  
  .card {
    background-color: #fff;
  }
  
  /* --------------------------------
  Siderail
  -------------------------------- */
  .siderail {
    position: fixed;
    right: 0;
    top: 0;
    bottom: 0;
    z-index: 100;
    
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    
    width: 64px;
    height: 100vh;
    padding: 46px 12px 20px 12px;
    border-left: 1px solid #eaeaeb;
    background: #fff;
    
    &__top-menu {
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      height: 40px;
      // margin-bottom: 30px;
    }
    
    &__bottom-menu {}
  }

  .siderail-item {
    display: inline-flex;
    position: relative;
    margin-bottom: 8px;
  }

  .siderail-item__button {
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    width: 40px;
    height: 40px;
    border: 0;
    background: none;
    cursor: pointer;
    
    svg {
      display: block;
      stroke: #000;
      z-index: 1;
    }
    
    &:before {
      content: "";
      position: absolute;
      width: 100%;
      height: 100%;
      left: 0;
      top: 0;
      opacity: 0;
      background-color: #9f9f9f;
      border-radius: 5px;
      transform: scale(.75);
      transition-property: transform;
      transition-duration: .15s;
    }
    
    &--active {
      svg {
        stroke: #712aff;
      }
      
      &:before {
        transform: scale(1);
        opacity: .17;
        background-color: #96f;
      }
      
      &:hover {
        &:before {
          opacity: .32 !important;
        }
      }
    }
    
    &:hover {
      &:before {
        transform: scale(1);
        opacity: .17;
      }
    }
  }

  .siderail-menu {
    position: absolute;
    top: 0;
    right: 0;
    margin-right: 60px;
    border-radius: 7px;
    background: #fff;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 100;
    
    &__section {
      display: flex; 
      align-items: center; 
      gap: 10px 10px;
      width: max-content;
      padding: 20px;
      border-bottom: 1px solid #e3e2e9;
    }
  }

  /* --------------------------------
  Input group
  -------------------------------- */
  .input-group {
    display: flex;

    > * {
      position: relative;
    }

    > *:not(:last-child):not(:first-child) {
      border-radius: 0;
    }

    > *:first-child {
      border-top-right-radius: 0;
      border-bottom-right-radius: 0;

      .select__input {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
      }
    }

    > *:last-child {
      border-top-left-radius: 0;
      border-bottom-left-radius: 0;

      .select__input {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
      }
    }

    > *:focus, *:focus-within {
      z-index: 1;
    }
  }

  .input-group__tag {
    display: flex;
    align-items: center;

    padding: 0 18.5px;
    background-color: #fff;
    border-radius: 5px;
    border: 2px solid #e3e2e9;

    white-space: nowrap;
    color: #68667f;

    &:first-child {
      border-right-width: 0px;
    }

    &:last-child {
      border-left-width: 0px;
    }
  }

  /* --------------------------------
  Select input
  -------------------------------- */
  .select {
    position: relative;
    width: 100%;
  }

  .select__icon {
    width: 16px;
    height: 16px;
    pointer-events: none;
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
  }

  /* --------------------------------
  Slider input
  -------------------------------- */
  .slider {
    position: relative;
    display: flex;
    align-items: center;
  }

  .slider__range {
    width: 100%;
    --slider-fill-value: 0%;
    --slider-empty-value: 100%;
  }

  .slider__input {
    display: block;
    -webkit-appearance: none;
    width: 100%;
    background: transparent;
  }

  .slider__input:focus {
    outline: none;
  }

  .slider__input::-webkit-slider-thumb {
    -webkit-appearance: none;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    border: none;
    background-color: #9966ff;
    box-shadow: var(--shadow-xs), var(--shadow-sm);
    cursor: -webkit-grab;
    cursor: grab;
    margin-top: calc((8px - 20px) * 0.5);
  }

  .slider__input:active::-webkit-slider-thumb {
    cursor: -webkit-grabbing;
    cursor: grabbing;
  }

  .slider__input::-moz-range-thumb {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    border: none;
    background-color: #9966ff;
    box-shadow: var(--shadow-xs), var(--shadow-sm);
    cursor: grab;
  }

  .slider__input:active::-moz-range-thumb {
    cursor: grabbing;
  }

  .slider__input:active::-ms-thumb {
    cursor: grabbing;
  }

  .slider__input:focus::-webkit-slider-thumb {
    box-shadow: var(--shadow-xs), var(--shadow-sm), 0 0 0 3px hsla(var(--color-primary-h), var(--color-primary-s), var(--color-primary-l), 0.2), var(--shadow-md);
  }

  .slider__input:focus::-moz-range-thumb {
    box-shadow: var(--shadow-xs), var(--shadow-sm), 0 0 0 3px hsla(var(--color-primary-h), var(--color-primary-s), var(--color-primary-l), 0.2), var(--shadow-md);
  }

  .slider__input::-webkit-slider-runnable-track {
    height: 8px;
    border-radius: 50em;
    background-image: linear-gradient(to right, #9966ff var(--slider-fill-value), var(--color-contrast-low) var(--slider-fill-value), var(--color-contrast-low) var(--slider-empty-value));
    margin-top: calc((20px - 8px) * 0.5);
  }

  .slider__input::-moz-range-track {
    height: 8px;
    border-radius: 50em;
    background-image: linear-gradient(to right, #9966ff var(--slider-fill-value), var(--color-contrast-low) var(--slider-fill-value), var(--color-contrast-low) var(--slider-empty-value));
  }

  .slider__input::-moz-focus-outer {
    border: 0;
  }

  .slider__input::-ms-tooltip {
    display: none;
  }

  .slider__input::-ms-thumb {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    border: none;
    background-color: #fff;
    box-shadow: var(--shadow-xs), var(--shadow-sm);
    cursor: grab;
    transform: translateY(0);
    background-color: white !important;
    box-shadow: inset 0 0 0 2px rgba(0, 0, 0, 0.1);
    height: 20px;
    width: 20px;
  }

  .slider__input:focus::-ms-thumb {
    box-shadow: inset 0 0 0 2px hsla(220deg, 90%, 56%, 0.2);
  }

  .slider__input::-ms-track {
    height: 8px;
    border-radius: 50em;
    background-image: linear-gradient(to right, #9966ff var(--slider-fill-value), var(--color-contrast-low) var(--slider-fill-value), var(--color-contrast-low) var(--slider-empty-value));
    background-color: hsl(240deg, 1%, 60%);
    color: transparent;
    height: 8px;
  }

  .slider__value {
    display: flex;
    align-items: center;  
  }  
}

.styleguide {
  position: fixed;
  top: 0;
  right: 30px;
  width: 100%;
  height: 100%;
  z-index: 90;
}
</style>
