import FormInput from '@/Components/Form/FormInput';
import FormItemWrapper from '@/Components/Form/FormItemWrapper';
import FormLabel from '@/Components/Form/FormLabel';
import FormTextArea from '@/Components/Form/FormTextArea';
import { Button } from '@/Components/Global/Button';
import Admin from '@/Layouts/Admin';
import { useForm } from '@inertiajs/inertia-react';
import React, { ChangeEvent, FormEvent } from 'react';

interface CreateInput extends HTMLInputElement {
  name: 'name' | 'website';
}

interface CreateTextArea extends HTMLTextAreaElement {
  name: 'bio';
}

interface FormElements extends HTMLFormControlsCollection {
  name: CreateInput;
  website: CreateInput;
  bio: CreateTextArea;
}

interface CreateForm extends HTMLFormElement {
  readonly elements: FormElements;
}

type Form = {
  name: string;
  website: string;
  bio: string;
};

const CreateArtist = () => {
  const { data, setData, post, processing, errors, reset } = useForm<Form>({
    name: '',
    website: '',
    bio: '',
  });

  function handleChange(e: ChangeEvent<CreateInput>): void;
  function handleChange(e: ChangeEvent<CreateTextArea>): void;
  function handleChange(
    e: ChangeEvent<CreateInput> | ChangeEvent<CreateTextArea>
  ) {
    setData(e.target.name, e.target.value);
  }

  const hanldeSubmit = (e: FormEvent<CreateForm>) => {
    e.preventDefault();
    void post(route('artist.store'), {
      onFinish: () => reset('name', 'website', 'bio'),
    });
  };

  return (
    <Admin title="New artist">
      <form onSubmit={hanldeSubmit} className="my-10">
        <FormItemWrapper>
          <FormLabel label="Artist name:" htmlFor="name" />
          <FormInput
            type="text"
            name="name"
            onChange={handleChange}
            value={data.name}
          />
        </FormItemWrapper>
        <FormItemWrapper>
          <FormLabel label="Artist biography:" htmlFor="bio" />
          <FormTextArea name="bio" value={data.bio} onChange={handleChange} />
        </FormItemWrapper>
        <FormItemWrapper>
          <FormLabel label="Artist website:" htmlFor="website" />
          <FormInput
            type="url"
            name="website"
            onChange={handleChange}
            value={data.website}
          />
        </FormItemWrapper>

        <Button>Create artist</Button>
      </form>
    </Admin>
  );
};

export default CreateArtist;
