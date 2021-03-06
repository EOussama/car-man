
			<div class="errors <?php echo ($lang === 'ar') ? "text-right" : "text-left" ?>">

			</div>
			<form id="send-form" enctype="multipart/form-data">
				<div class="form-group <?php echo ($lang === 'ar') ? "text-right" : "text-left" ?>">
					<label for="nameTarget"><?php echo lang('FORM_LABEL_NAME'); ?></label>
					<input type="text" class="form-control <?php echo ($lang === 'ar') ? "text-right" : "text-left" ?>" id="nameTarget" aria-describedby="nameHelp" placeholder="<?php echo lang('FORM_INPUT_NAME'); ?>" name="name" required>
					<small id="nameHelp" class="form-text text-muted"><?php echo lang('FORM_HELP_NAME'); ?></small>
				</div>
				<div class="form-group <?php echo ($lang === 'ar') ? "text-right" : "text-left" ?>">
					<label for="emailTarget"><?php echo lang('FORM_LABEL_EMAIL'); ?></label>
					<input type="email" class="form-control <?php echo ($lang === 'ar') ? "text-right" : "text-left" ?>" id="emailTarget" aria-describedby="emailHelp" placeholder="<?php echo lang('FORM_INPUT_EMAIL'); ?>" name="email" required>
					<small id="emailHelp" class="form-text text-muted"><?php echo lang('FORM_HELP_EMAIL'); ?></small>
				</div>
				<div class="form-group <?php echo ($lang === 'ar') ? "text-right" : "text-left" ?>">
					<label for="brand-select"><?php echo lang('FORM_LABEL_BRAND'); ?></label>
					<select class="form-control <?php echo ($lang === 'ar') ? "text-right" : "text-left" ?>" id="brand-select" name="brand">
						<?php foreach($brands as $brand): ?>
							<?php echo "<option value=\"" . $brand['BrandID'] . "\">" . $brand['BrandName'] . "</option>"; ?>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group <?php echo ($lang === 'ar') ? "text-right" : "text-left" ?>">
					<label for="model-select"><?php echo lang('FORM_LABEL_MODEL'); ?></label>
					<select class="form-control <?php echo ($lang === 'ar') ? "text-right" : "text-left" ?>" id="model-select" name="model">
						
					</select>
				</div>
				<div class="form-group <?php echo ($lang === 'ar') ? "text-right" : "text-left" ?>">
					<label for="plateTarget"><?php echo lang('FORM_LABEL_PLATE_NUMBER'); ?></label>
					<input type="text" class="form-control <?php echo ($lang === 'ar') ? "text-right" : "text-left" ?>" id="plateTarget" aria-describedby="plateHelp" placeholder="<?php echo lang('FORM_INPUT_PLATE_NUMBER'); ?>" name="plateNumber" required>
					<small id="plateHelp" class="form-text text-muted"><?php echo lang('FORM_HELP_PLATE_NUMBER'); ?></small>
				</div>
				<div class="form-group <?php echo ($lang === 'ar') ? "text-right" : "text-left" ?>">
					<label for="yearHelp"><?php echo lang('FORM_LABEL_YEAR'); ?></label>
					<input type="number" class="form-control <?php echo ($lang === 'ar') ? "text-right" : "text-left" ?>" id="yearHelp" aria-describedby="yearHelp" placeholder="<?php echo lang('FORM_INPUT_YEAR'); ?>" name="year">
					<small id="yearHelp" class="form-text text-muted"><?php echo lang('FORM_HELP_YEAR'); ?></small>
				</div>
				<div class="form-group <?php echo ($lang === 'ar') ? "text-right" : "text-left" ?>">
					<label for="motive-select"><?php echo lang('FORM_LABEL_MOTIVE'); ?></label>
					<select class="form-control <?php echo ($lang === 'ar') ? "text-right" : "text-left" ?>" id="motive-select" name="motive">
						<option value="1"><?php echo lang('FORM_SELECT_MOTIVE_ACCIDENT'); ?></option>
						<option value="2"><?php echo lang('FORM_SELECT_MOTIVE_FAULT'); ?></option>
						<option value="3"><?php echo lang('FORM_SELECT_MOTIVE_FIRE'); ?></option>
						<option value="4"><?php echo lang('FORM_SELECT_MOTIVE_STOLEN'); ?></option>
					</select>
				</div>
				<div class="form-group <?php echo ($lang === 'ar') ? "text-right" : "text-left" ?>">
					<label for="textareaTarget"><?php echo lang('FORM_INPUT_OBSERVATIONS'); ?></label>
					<textarea class="form-control <?php echo ($lang === 'ar') ? "text-right" : "text-left" ?>" id="textareaTarget" rows="4" name="observations"></textarea>
				</div>
				<div class="form-group <?php echo ($lang === 'ar') ? "text-right" : "text-left" ?>">
					<label for="imageTarget"><?php echo lang('FORM_LABEL_IMAGE'); ?></label>
					<input type="file" class="form-control-file" id="imageTarget" name="image" accept="image/*">
				</div>

				<input type="hidden" value="<?= $lang; ?>" name="language">
				<button type="submit" class="btn btn-primary btn-lg btn-block"><?php echo lang('FORM_BUTTON_SAVE'); ?></button>
				<button type="reset" class="btn btn-secondary btn-lg btn-block"><?php echo lang('FORM_BUTTON_RESET'); ?></button>
			</form>

			<!-- Modal -->
			<div class="modal fade" id="loading-modal" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header align-items-center">
							<strong><?= lang('MODAL_SENDING_LABEL') ?>...</strong>
							<div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
						</div>
						<div class="modal-body">
							<?= lang('MODAL_SENT_LABEL') ?>
						</div>
					</div>
				</div>
			</div>