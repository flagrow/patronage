import { extend } from 'flarum/extend';
import app from 'flarum/app';
import LogInButtons from 'flarum/components/LogInButtons';
import LogInButton from 'flarum/components/LogInButton';

app.initializers.add('flarum-auth-github', () => {
  extend(LogInButtons.prototype, 'items', function(items) {
    items.add('patronage',
      <LogInButton
        className="Button patronage"
        icon="patreon"
        path="/auth/patronage">
        {app.translator.trans('flagrow-patronage.forum.log_in.with_patreon_button')}
      </LogInButton>
    );
  });
});
