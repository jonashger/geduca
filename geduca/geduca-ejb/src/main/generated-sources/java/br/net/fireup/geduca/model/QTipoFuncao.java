package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QTipoFuncao is a Querydsl query type for TipoFuncao
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QTipoFuncao extends EntityPathBase<TipoFuncao> {

    private static final long serialVersionUID = -1820329794L;

    public static final QTipoFuncao tipoFuncao = new QTipoFuncao("tipoFuncao");

    public final StringPath descricao = createString("descricao");

    public final NumberPath<Long> id = createNumber("id", Long.class);

    public QTipoFuncao(String variable) {
        super(TipoFuncao.class, forVariable(variable));
    }

    public QTipoFuncao(Path<? extends TipoFuncao> path) {
        super(path.getType(), path.getMetadata());
    }

    public QTipoFuncao(PathMetadata<?> metadata) {
        super(TipoFuncao.class, metadata);
    }

}

