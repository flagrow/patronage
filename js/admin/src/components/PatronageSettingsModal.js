import SettingsModal from 'flarum/components/SettingsModal';

export default class PatronageSettingsModal extends SettingsModal {
  className() {
    return 'PatronageSettingsModal Modal--small';
  }

  title() {
    return app.translator.trans('flagrow-patronage.admin.github_settings.title');
  }

  form() {
    return [
      <div className="Form-group">
        <label>{app.translator.trans('flagrow-patronage.admin.github_settings.client_id_label')}</label>
        <input className="FormControl" bidi={this.setting('flagrow-patronage.client_id')}/>
      </div>,

      <div className="Form-group">
        <label>{app.translator.trans('flagrow-patronage.admin.github_settings.client_secret_label')}</label>
        <input className="FormControl" bidi={this.setting('flagrow-patronage.client_secret')}/>
      </div>
    ];
  }
}
