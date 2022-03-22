import FormInput from '@/Components/Form/FormInput';
import FormItemWrapper from '@/Components/Form/FormItemWrapper';
import FormLabel from '@/Components/Form/FormLabel';
import FormTextArea from '@/Components/Form/FormTextArea';
import { Button } from '@/Components/Global/Button';
import Admin from '@/Layouts/Admin';
import { useForm } from '@inertiajs/inertia-react';
import React, { ChangeEvent, FormEvent, useState } from 'react';

interface CreateTextArea extends HTMLTextAreaElement {
  name: 'excerpt' | 'content';
}

interface CreateInput extends HTMLInputElement {
  name: 'is_published';
}

interface FormElements extends HTMLFormControlsCollection {
  excerpt: CreateTextArea;
  content: CreateTextArea;
  is_published: CreateInput;
}

interface CreateForm extends HTMLFormElement {
  readonly elements: FormElements;
}

type Form = {
  excerpt: string;
  content: string;
  is_published: boolean;
  album_id: number;
};

type Props = {
  album: App.Album;
};

const CreateReview = ({ album }: Props) => {
  const [checked, setChecked] = useState<boolean>(false);

  const toggleChecked = (e) => {
    setData('is_published', e.target.checked);
    setChecked((value) => !value);
  };

  const { data, setData, post, processing } = useForm<Form>({
    excerpt: '',
    content: '',
    is_published: checked,
    album_id: album.id,
  });

  function handleChange(e: ChangeEvent<CreateTextArea>): void;
  function handleChange(e: ChangeEvent<CreateInput>): void;
  function handleChange(
    e: ChangeEvent<CreateInput> | ChangeEvent<CreateTextArea>
  ) {
    setData(e.target.name, e.target.value);
  }

  const handleSubmit = (e: FormEvent<CreateForm>) => {
    e.preventDefault();
    void post(route('review.store'));
  };

  return (
    <Admin title="New review">
      <p>
        You're reviewing <span className="font-bold">{album.title}</span>
      </p>
      <form onSubmit={handleSubmit} className="my-10">
        <FormItemWrapper>
          <FormLabel label="Excerpt:" htmlFor="excerpt" />
          <FormTextArea
            name="excerpt"
            cols={30}
            rows={5}
            value={data.excerpt}
            onChange={handleChange}
          />
        </FormItemWrapper>

        <FormItemWrapper>
          <FormLabel label="Content" htmlFor="content" />
          <FormTextArea
            name="content"
            value={data.content}
            onChange={handleChange}
          />
        </FormItemWrapper>

        <div className="flex space-x-2 mb-5 items-center">
          <FormLabel label="Publish:" htmlFor="is_published" />
          <FormInput
            type="checkbox"
            name="is_published"
            checked={checked}
            onChange={toggleChecked}
          />
        </div>

        <Button>Save review</Button>
      </form>
    </Admin>
  );
};

export default CreateReview;
