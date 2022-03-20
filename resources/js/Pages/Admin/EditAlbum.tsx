import FormInput from '@/Components/Form/FormInput';
import FormItemWrapper from '@/Components/Form/FormItemWrapper';
import FormLabel from '@/Components/Form/FormLabel';
import FormTextArea from '@/Components/Form/FormTextArea';
import Admin from '@/Layouts/Admin';
import { useForm } from '@inertiajs/inertia-react';
import React, { ChangeEvent, FormEvent } from 'react';

interface UpdateInput extends HTMLInputElement {
  name: 'title' | 'edition' | 'released_date';
}

interface UpdateTextArea extends HTMLTextAreaElement {
  name: 'description';
}

interface UpdateFile extends HTMLImageElement {
  name: 'cover';
}

interface FormElements extends HTMLFormControlsCollection {
  title: UpdateInput;
  edition: UpdateInput;
  released_date: UpdateInput;
  description: UpdateTextArea;
  cover: UpdateFile;
}

interface UpdateForm extends HTMLFormElement {
  readonly elements: FormElements;
}

type Form = {
  _method: 'PUT';
  title: string;
  edition: string;
  released_date: string;
  description: string;
  cover: File | null;
};

type Props = {
  album: App.Album;
};

const EditAlbum = ({ album }: Props) => {
  const { data, setData, post, processing, errors } = useForm<Form>({
    _method: 'PUT',
    title: album.title,
    edition: album.edition,
    released_date: album.released_date,
    description: album.description,
    cover: null,
  });

  function handleChange(e: ChangeEvent<UpdateInput>): void;
  function handleChange(e: ChangeEvent<UpdateTextArea>): void;
  function handleChange(
    e: ChangeEvent<UpdateInput> | ChangeEvent<UpdateTextArea>
  ) {
    setData(e.target.name, e.target.value);
  }

  const handleSubmit = (e: FormEvent<UpdateForm>) => {
    e.preventDefault();
    void post(route('album.update', [album.id]));
  };

  return (
    <Admin title="Name">
      <form onSubmit={handleSubmit}>
        <FormItemWrapper>
          <FormLabel label="Album title:" htmlFor="title" />
          <FormInput
            type="text"
            name="title"
            onChange={handleChange}
            value={data.title}
          />
        </FormItemWrapper>

        <FormItemWrapper>
          <FormLabel label="Album edition:" htmlFor="edition" />
          <FormInput
            type="text"
            name="edition"
            onChange={handleChange}
            value={data.edition}
          />
        </FormItemWrapper>

        <FormItemWrapper>
          <FormLabel label="Description:" htmlFor="description" />
          <FormTextArea
            name="description"
            value={data.description}
            onChange={handleChange}
          />
        </FormItemWrapper>

        <FormItemWrapper>
          <FormLabel label="Release date:" htmlFor="released_date" />
          <FormInput
            type="date"
            name="released_date"
            onChange={handleChange}
            value={data.released_date}
          />
        </FormItemWrapper>

        <FormItemWrapper>
          <FormLabel label="Album cover:" htmlFor="cover" />
          <FormInput
            type="file"
            name="cover"
            onChange={(e) =>
              setData(
                'cover',
                // @ts-expect-error
                e.target.files[0]
              )
            }
          />
        </FormItemWrapper>
      </form>
    </Admin>
  );
};

export default EditAlbum;
