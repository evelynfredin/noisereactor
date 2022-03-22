import FormInput from '@/Components/Form/FormInput';
import FormItemWrapper from '@/Components/Form/FormItemWrapper';
import FormLabel from '@/Components/Form/FormLabel';
import FormTextArea from '@/Components/Form/FormTextArea';
import { Button } from '@/Components/Global/Button';
import Admin from '@/Layouts/Admin';
import { useForm } from '@inertiajs/inertia-react';
import React, { ChangeEvent, FormEvent, useState } from 'react';

interface UpdateTextAre extends HTMLTextAreaElement {
  name: 'excerpt' | 'content';
}

interface UpdateInput extends HTMLInputElement {
  name: 'is_published';
}

interface FormElements extends HTMLFormControlsCollection {
  excerpt: UpdateTextAre;
  content: UpdateTextAre;
  is_published: UpdateInput;
}

interface UpdateForm extends HTMLFormElement {
  readonly elements: FormElements;
}

type FormData = {
  _method: 'PUT';
  excerpt: string;
  content: string;
  is_published: boolean;
  album_id: number;
};

type Props = {
  review: App.Review;
};

const EditReview = ({ review }: Props) => {
  const { data, setData, post, errors } = useForm<FormData>({
    _method: 'PUT',
    excerpt: review.excerpt,
    content: review.content,
    is_published: review.is_published,
    album_id: review.album_id,
  });

  function handleChange(e: ChangeEvent<UpdateTextAre>): void;
  function handleChange(e: ChangeEvent<UpdateInput>): void;
  function handleChange(e) {
    setData(
      e.target.name,
      e.target.type === 'checkbox' ? e.target.checked : e.target.value
    );
  }

  const handleSubmit = (e: FormEvent<UpdateForm>) => {
    e.preventDefault();
    void post(route('review.update', [review.id]));
  };

  return (
    <Admin title="Edit review">
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
            checked={data.is_published}
            onChange={handleChange}
          />
        </div>

        <Button>Update review</Button>
      </form>
    </Admin>
  );
};

export default EditReview;
