'use strict';

System.register('flagrow/patronage/main', ['flarum/extend', 'flarum/app', 'flarum/components/LogInButtons', 'flarum/components/LogInButton'], function (_export, _context) {
  "use strict";

  var extend, app, LogInButtons, LogInButton;
  return {
    setters: [function (_flarumExtend) {
      extend = _flarumExtend.extend;
    }, function (_flarumApp) {
      app = _flarumApp.default;
    }, function (_flarumComponentsLogInButtons) {
      LogInButtons = _flarumComponentsLogInButtons.default;
    }, function (_flarumComponentsLogInButton) {
      LogInButton = _flarumComponentsLogInButton.default;
    }],
    execute: function () {

      app.initializers.add('flagrow-patronage', function () {
        extend(LogInButtons.prototype, 'items', function (items) {
          items.add('patronage', m(
            LogInButton,
            {
              className: 'Button patronage',
              icon: 'patreon',
              path: '/auth/patronage' },
            app.translator.trans('flagrow-patronage.forum.log_in.with_patreon_button')
          ));
        });
      });
    }
  };
});