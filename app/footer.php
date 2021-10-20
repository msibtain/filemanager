<!-- start chat sidebar -->
      <div class="chat-sidebar-container" data-close-on-body-click="false">
        <div class="chat-sidebar">
          <ul class="nav nav-tabs">
            
            <li class="nav-item">
              <a href="#quick_sidebar_tab_3" class="nav-link tab-icon" data-bs-toggle="tab"> <i
                  class="material-icons">settings</i>
                Settings
              </a>
            </li>
          </ul>
          <div class="tab-content">
            
            <!-- Start Setting Panel -->
            <div class="tab-pane chat-sidebar-settings in active show" role="tabpanel" id="quick_sidebar_tab_3">
              <div class="chat-sidebar-settings-list slimscroll-style">
                <div class="chat-header">
                  <h5 class="list-heading">Layout Settings</h5>
                </div>
                <div class="chatpane inner-content ">
                  <div class="settings-list">
                    <div class="setting-item">
                      <div class="setting-text">Sidebar Position</div>
                      <div class="setting-set">
                        <select
                          class="sidebar-pos-option form-control input-inline input-sm input-small ">
                          <option value="left" selected="selected">Left</option>
                          <option value="right">Right</option>
                        </select>
                      </div>
                    </div>
                    <div class="setting-item">
                      <div class="setting-text">Header</div>
                      <div class="setting-set">
                        <select
                          class="page-header-option form-control input-inline input-sm input-small ">
                          <option value="fixed" selected="selected">Fixed</option>
                          <option value="default">Default</option>
                        </select>
                      </div>
                    </div>
                    <div class="setting-item">
                      <div class="setting-text">Footer</div>
                      <div class="setting-set">
                        <select
                          class="page-footer-option form-control input-inline input-sm input-small ">
                          <option value="fixed">Fixed</option>
                          <option value="default" selected="selected">Default</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="chat-header">
                    <h5 class="list-heading">Account Settings</h5>
                  </div>
                  <div class="settings-list">
                    <div class="setting-item">
                      <div class="setting-text">Notifications</div>
                      <div class="setting-set">
                        <div class="switch">
                          <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                            for="switch-1">
                            <input type="checkbox" id="switch-1" class="mdl-switch__input"
                              checked>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="setting-item">
                      <div class="setting-text">Show Online</div>
                      <div class="setting-set">
                        <div class="switch">
                          <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                            for="switch-7">
                            <input type="checkbox" id="switch-7" class="mdl-switch__input"
                              checked>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="setting-item">
                      <div class="setting-text">Status</div>
                      <div class="setting-set">
                        <div class="switch">
                          <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                            for="switch-2">
                            <input type="checkbox" id="switch-2" class="mdl-switch__input"
                              checked>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="setting-item">
                      <div class="setting-text">2 Steps Verification</div>
                      <div class="setting-set">
                        <div class="switch">
                          <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                            for="switch-3">
                            <input type="checkbox" id="switch-3" class="mdl-switch__input"
                              checked>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div> -->
                  <div class="chat-header">
                    <h5 class="list-heading">General Settings</h5>
                  </div>
                  <div class="settings-list">
                    <div class="setting-item">
                      <div class="setting-text">Location</div>
                      <div class="setting-set">
                        <div class="switch">
                          <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                            for="switch-4">
                            <input type="checkbox" id="switch-4" class="mdl-switch__input"
                              checked>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="setting-item">
                      <div class="setting-text">Save Histry</div>
                      <div class="setting-set">
                        <div class="switch">
                          <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                            for="switch-5">
                            <input type="checkbox" id="switch-5" class="mdl-switch__input"
                              checked>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="setting-item">
                      <div class="setting-text">Auto Updates</div>
                      <div class="setting-set">
                        <div class="switch">
                          <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                            for="switch-6">
                            <input type="checkbox" id="switch-6" class="mdl-switch__input"
                              checked>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end chat sidebar -->
    </div>
    <!-- end page container -->
    <!-- start footer -->
    <div class="page-footer">
      <div class="page-footer-inner"> 2017 &copy; Smart University Theme By
        <a href="mailto:redstartheme@gmail.com" target="_top" class="makerCss">Redstar Theme</a>
      </div>
      <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
      </div>
    </div>
    <!-- end footer -->
  </div>
  
  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="confirm_modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" disabled="disabled" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="uni_modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
  
  
  <!-- start js include path -->
  <script src="../assets/plugins/jquery/jquery.min.js"></script>
  <script src="../assets/plugins/popper/popper.js"></script>
  <script src="../assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
  <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
  <!-- bootstrap -->
  <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
  <script src="../assets/plugins/sparkline/jquery.sparkline.js"></script>
  <script src="../assets/js/pages/sparkline/sparkline-data.js"></script>
  <!-- Common js-->
  <script src="../assets/js/app.js"></script>
  <script src="../assets/js/layout.js"></script>
  <script src="../assets/js/theme-color.js"></script>
  <!-- material -->
  <script src="../assets/plugins/material/material.min.js"></script>
  <!--apex chart-->
  <script src="../assets/plugins/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/js/pages/chart/chartjs/home-data.js"></script>
  <!-- summernote -->
  <script src="../assets/plugins/summernote/summernote.js"></script>
  <script src="../assets/js/pages/summernote/summernote-data.js"></script>
  <!-- end js include path -->
</body>

</html>