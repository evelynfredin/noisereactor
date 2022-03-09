import FormInput from '@/Components/Form/FormInput';
import FormItemWrapper from '@/Components/Form/FormItemWrapper';
import FormLabel from '@/Components/Form/FormLabel';
import { Button } from '@/Components/Global/Button';
import Logo from '@/Components/Global/Logo';
import { useForm } from '@inertiajs/inertia-react';
import React from 'react';

interface LoginInput extends HTMLInputElement {
  name: 'email' | 'password' | 'remember';
}

interface FormElements extends HTMLFormControlsCollection {
  email: LoginInput;
  password: LoginInput;
  remember: LoginInput;
}

interface LoginForm extends HTMLFormElement {
  readonly elements: FormElements;
}

const Login = () => {
  const { data, setData, post, processing, errors, reset } = useForm({
    email: '',
    password: '',
    remember: false,
  });

  const handleChange = (e: React.ChangeEvent<LoginInput>) => {
    setData(
      e.target.name,
      e.target.type === 'checkbox' ? e.target.checked : e.target.value
    );
  };

  const handleSubmit = (e: React.FormEvent<LoginForm>) => {
    e.preventDefault();
    void post(route('login'), {
      onFinish: () => reset('password'),
    });
  };

  return (
    <div className="h-screen flex items-center">
      <section className="w-full mx-5 md:max-w-sm md:mx-auto">
        <Logo className="fill-current text-gray-400 mx-auto" path="/" />
        <div className="bg-slate-100 px-5 pt-10 pb-5 rounded-lg shadow-sm mt-10">
          <h3 className="text-2xl text-center">Welcome back!</h3>
          <form onSubmit={handleSubmit}>
            <FormItemWrapper>
              <FormLabel htmlFor="email" label="Email" />
              <FormInput type="email" name="email" onChange={handleChange} />
            </FormItemWrapper>
            <FormItemWrapper>
              <FormLabel htmlFor="password" label="Password" />
              <FormInput
                type="password"
                name="password"
                onChange={handleChange}
              />
            </FormItemWrapper>
            <FormItemWrapper>
              <Button disabled={processing}>Log in</Button>
            </FormItemWrapper>
            <p className="text-gray-400 text-center text-sm">
              Dare mighty things!
            </p>
          </form>
        </div>
      </section>
    </div>
  );
};

export default Login;
