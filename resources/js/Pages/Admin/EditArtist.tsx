import Confirm from '@/Components/Admin/Confirm';
import FormInput from '@/Components/Form/FormInput';
import FormItemWrapper from '@/Components/Form/FormItemWrapper';
import FormLabel from '@/Components/Form/FormLabel';
import FormTextArea from '@/Components/Form/FormTextArea';
import { Button, LinkButton } from '@/Components/Global/Button';
import Admin from '@/Layouts/Admin';
import { Inertia } from '@inertiajs/inertia';
import { useForm } from '@inertiajs/inertia-react';
import clsx from 'clsx';
import React, { ChangeEvent, FormEvent, useState } from 'react';

interface UpdateInput extends HTMLInputElement {
  name: 'name' | 'website';
}

interface UpdateTextArea extends HTMLTextAreaElement {
  name: 'bio';
}

interface UpdateFile extends HTMLImageElement {
  name: 'pic';
}

interface FormElements extends HTMLFormControlsCollection {
  name: UpdateInput;
  website: UpdateInput;
  bio: UpdateTextArea;
  pic: UpdateFile;
}

type FormData = {
  _method: 'PUT';
  name: string;
  website: string;
  bio: string;
  pic: File | null;
};

interface UpdateForm extends HTMLFormElement {
  readonly elements: FormElements;
}

type Props = {
  artist: App.Artist;
};

const EditArtist = ({ artist }: Props) => {
  const [dialog, setDialog] = useState<boolean>(false);

  const { data, post, setData, processing, errors } = useForm<FormData>({
    _method: 'PUT',
    name: artist.name,
    bio: artist.bio,
    website: artist.website,
    pic: null,
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
    void post(route('artist.update', [artist.id]));
  };

  const handleConfirm = (e) => {
    e.preventDefault();
    setDialog(true);
  };

  const handleDelete = () => {
    void Inertia.delete(route('artist.destroy', [artist]), {
      preserveScroll: true,
      onSuccess: () => setDialog(false),
    });
  };

  return (
    <>
      <div className={clsx(dialog ? 'block' : 'hidden')}>
        <Confirm showDialog={() => setDialog(false)}>
          <Button dangerBtn onClick={handleDelete}>
            Delete
          </Button>
        </Confirm>
      </div>
      <Admin title={artist.name}>
        <div className="flex justify-end mt-5 md:mt-0">
          <Button dangerBtn onClick={() => setDialog(true)}>
            Delete
          </Button>
        </div>
        <div>{errors.name}</div>

        <form onSubmit={handleSubmit} className="mb-20">
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

          <FormItemWrapper>
            <FormLabel label="Artist pic:" htmlFor="pic" />
            <FormInput
              type="file"
              name="pic"
              onChange={(e) =>
                setData(
                  'pic',
                  // @ts-expect-error
                  e.target.files[0]
                )
              }
            />
          </FormItemWrapper>

          <Button disabled={processing}>Update</Button>
        </form>
      </Admin>
    </>
  );
};

export default EditArtist;
