import app from 'flarum/app';

import PatronageSettingsModal from './components/PatronageSettingsModal';

app.initializers.add('flagrow-patronage', () => {
  app.extensionSettings['flagrow-patronage'] = () => app.modal.show(new PatronageSettingsModal());
});
